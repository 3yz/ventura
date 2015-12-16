<?php

namespace App\Console\Commands\Admin;

use File;
use Illuminate\Console\Command;

class View extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:view
                            {name : The name of the Crud.}
                            {--fields= : The fields name for the form.}
                            {--view-path= : The name of the view path.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create views for the Crud.';

    /**
     *  Form field types collection.
     *
     * @var array
     */
    protected $typeLookup = [
        'string' => 'text',
        'char' => 'text',
        'varchar' => 'text',
        'text' => 'textarea',
        'mediumtext' => 'textarea',
        'longtext' => 'textarea',
        'json' => 'textarea',
        'jsonb' => 'textarea',
        'binary' => 'textarea',
        'password' => 'password',
        'email' => 'email',
        'number' => 'number',
        'integer' => 'number',
        'bigint' => 'number',
        'mediumint' => 'number',
        'tinyint' => 'number',
        'smallint' => 'number',
        'decimal' => 'number',
        'double' => 'number',
        'float' => 'number',
        'date' => 'date',
        'datetime' => 'datetime-local',
        'time' => 'time',
        'boolean' => 'radio',
    ];

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $viewPath = $this->option('view-path') ? strtolower($this->option('view-path')) . '.' : '';
        $crudName = strtolower($this->argument('name'));
        $crudNameCap = ucwords($crudName);
        $crudNameSingular = str_singular($crudName);
        $crudNameSingularCap = ucwords($crudNameSingular);
        $crudNamePlural = str_plural($crudName);
        $crudNamePluralCap = ucwords($crudNamePlural);

        $viewDirectory = base_path('resources/views/');
        if ($this->option('view-path')) {
            $userPath = $this->option('view-path');
            $path = $viewDirectory . $userPath . '/' . $crudNamePlural . '/';
        } else {
            $path = $viewDirectory . $crudNamePlural . '/';
        }

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $fields = $this->option('fields');
        $fieldsArray = explode(',', $fields);

        $formFields = [];
        $x = 0;
        foreach ($fieldsArray as $item) {
            $itemArray = explode(':', $item);
            $formFields[$x]['name'] = trim($itemArray[0]);
            $formFields[$x]['type'] = trim($itemArray[1]);
            $formFields[$x]['required'] = (isset($itemArray[2]) && (trim($itemArray[2]) == 'req' || trim($itemArray[2]) == 'required')) ? true : false;

            $x++;
        }

        $formFieldsHtml = '';
        foreach ($formFields as $item) {
            $formFieldsHtml .= $this->createField($item);
        }

        // Form fields and label
        $formHeadingHtml = '<th>ID</th>';
        $formBodyHtml = '';
        $formBodyHtmlForShowView = '';

        $i = 0;
        foreach ($formFields as $key => $value) {
            // if ($i == 3) {
            //     break;
            // }

            $field = $value['name'];
            $label = ucwords(str_replace('_', ' ', $field));
            $formHeadingHtml .= '<th>' . $label . '</th>';

            // if ($i == 0) {
            //     $formBodyHtml .= '<td><a href="{{ url(\'/%%crudName%%\', $item->id) }}">{{ $item->' . $field . ' }}</a></td>';
            // } else {
            //     $formBodyHtml .= '<td>{{ $item->' . $field . ' }}</td>';
            // }
            $formBodyHtmlForShowView .= '<dt>'.$label.'</dt><dd> {{ $%%crudNameSingular%%->' . $field . ' }} </dd>';

            $i++;
        }

        // For index.blade.php file
        $indexFile = base_path(). '/resources/stubs/index.blade.stub';
        $newIndexFile = $path . 'index.blade.php';
        if (!File::copy($indexFile, $newIndexFile)) {
            echo "failed to copy $indexFile...\n";
        } else {
            File::put($newIndexFile, str_replace('%%formHeadingHtml%%', $formHeadingHtml, File::get($newIndexFile)));
            File::put($newIndexFile, str_replace('%%formBodyHtml%%', $formBodyHtml, File::get($newIndexFile)));
            File::put($newIndexFile, str_replace('%%viewPath%%', $viewPath, File::get($newIndexFile)));
            File::put($newIndexFile, str_replace('%%crudName%%', $crudName, File::get($newIndexFile)));
            File::put($newIndexFile, str_replace('%%crudNameCap%%', $crudNameCap, File::get($newIndexFile)));
            File::put($newIndexFile, str_replace('%%crudNamePlural%%', $crudNamePlural, File::get($newIndexFile)));
            File::put($newIndexFile, str_replace('%%crudNamePluralCap%%', $crudNamePluralCap, File::get($newIndexFile)));
        }

        // For create.blade.php file
        $createFile = base_path(). '/resources/stubs/create.blade.stub';
        $newCreateFile = $path . 'create.blade.php';
        if (!File::copy($createFile, $newCreateFile)) {
            echo "failed to copy $createFile...\n";
        } else {
            File::put($newCreateFile, str_replace('%%viewPath%%', $viewPath, File::get($newCreateFile)));
            File::put($newCreateFile, str_replace('%%crudName%%', $crudName, File::get($newCreateFile)));
            File::put($newCreateFile, str_replace('%%crudNameSingularCap%%', $crudNameSingularCap, File::get($newCreateFile)));
            File::put($newCreateFile, str_replace('%%formFieldsHtml%%', $formFieldsHtml, File::get($newCreateFile)));
            File::put($newCreateFile, str_replace('%%crudNamePlural%%', $crudNamePlural, File::get($newCreateFile)));
            File::put($newCreateFile, str_replace('%%crudNamePluralCap%%', $crudNamePluralCap, File::get($newCreateFile)));
        }

        // For edit.blade.php file
        $editFile = base_path(). '/resources/stubs/edit.blade.stub';
        $newEditFile = $path . 'edit.blade.php';
        if (!File::copy($editFile, $newEditFile)) {
            echo "failed to copy $editFile...\n";
        } else {
            File::put($newEditFile, str_replace('%%viewPath%%', $viewPath, File::get($newEditFile)));
            File::put($newEditFile, str_replace('%%crudName%%', $crudName, File::get($newEditFile)));
            File::put($newEditFile, str_replace('%%crudNameSingular%%', $crudNameSingular, File::get($newEditFile)));
            File::put($newEditFile, str_replace('%%crudNameSingularCap%%', $crudNameSingularCap, File::get($newEditFile)));
            File::put($newEditFile, str_replace('%%formFieldsHtml%%', $formFieldsHtml, File::get($newEditFile)));
            File::put($newEditFile, str_replace('%%crudNamePlural%%', $crudNamePlural, File::get($newEditFile)));
            File::put($newEditFile, str_replace('%%crudNamePluralCap%%', $crudNamePluralCap, File::get($newEditFile)));
        }

        // For show.blade.php file
        $showFile = base_path(). '/resources/stubs/show.blade.stub';
        $newShowFile = $path . 'show.blade.php';
        if (!File::copy($showFile, $newShowFile)) {
            echo "failed to copy $showFile...\n";
        } else {
            File::put($newShowFile, str_replace('%%viewPath%%', $viewPath, File::get($newShowFile)));
            File::put($newShowFile, str_replace('%%formHeadingHtml%%', $formHeadingHtml, File::get($newShowFile)));
            File::put($newShowFile, str_replace('%%formBodyHtml%%', $formBodyHtmlForShowView, File::get($newShowFile)));
            File::put($newShowFile, str_replace('%%crudNameSingular%%', $crudNameSingular, File::get($newShowFile)));
            File::put($newShowFile, str_replace('%%crudNameSingularCap%%', $crudNameSingularCap, File::get($newShowFile)));
            File::put($newShowFile, str_replace('%%crudNamePlural%%', $crudNamePlural, File::get($newShowFile)));
            File::put($newShowFile, str_replace('%%crudNamePluralCap%%', $crudNamePluralCap, File::get($newShowFile)));
        }

        $this->info('View created successfully.');
    }

    /**
     * Form field wrapper.
     *
     * @param  $item
     * @param  $field
     *
     * @return void
     */
    protected function wrapField($item, $field)
    {
        $formGroup =
            <<<EOD

                        <div class="item form-group {{ \$errors->has('%1\$s') ? 'has-error' : ''}}">
                            {!! Form::label('%1\$s', '%2\$s: ', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                %3\$s
                            </div>
                        </div>\n
EOD;

        return sprintf($formGroup, $item['name'], ucwords(strtolower(str_replace('_', ' ', $item['name']))), $field);
    }

    /**
     * Form field generator.
     *
     * @param $item
     *
     * @return string
     */
    protected function createField($item)
    {
        switch ($this->typeLookup[$item['type']]) {
            case 'password':
                return $this->createPasswordField($item);
                break;
            case 'datetime-local':
            case 'time':
                return $this->createInputField($item);
                break;
            case 'radio': //special
                return $this->createRadioField($item);
                break;
            default: // text
                return $this->createFormField($item);
        }
    }

    /**
     * Create a specific field using the form helper.
     *
     * @param $item
     *
     * @return string
     */
    protected function createFormField($item)
    {
        $required = ($item['required'] === true) ? ", 'required' => 'required'" : "";

        return $this->wrapField(
            $item,
            "{!! Form::" . $this->typeLookup[$item['type']] . "('" . $item['name'] . "', null, ['class' => 'form-control col-md-7 col-xs-12'$required]) !!}"
        );
    }

    /**
     * Create a password field using the form helper.
     *
     * @param $item
     *
     * @return string
     */
    protected function createPasswordField($item)
    {
        $required = ($item['required'] === true) ? ", 'required' => 'required'" : "";

        return $this->wrapField(
            $item,
            "{!! Form::password('" . $item['name'] . "', ['class' => 'form-control col-md-7 col-xs-12'$required]) !!}"
        );
    }

    /**
     * Create a generic input field using the form helper.
     *
     * @param $item
     *
     * @return string
     */
    protected function createInputField($item)
    {
        $required = ($item['required'] === true) ? ", 'required' => 'required'" : "";

        return $this->wrapField(
            $item,
            "{!! Form::input('" . $this->typeLookup[$item['type']] . "', '" . $item['name'] . "', null, ['class' => 'form-control col-md-7 col-xs-12'$required]) !!}"
        );
    }

    /**
     * Create a yes/no radio button group using the form helper.
     *
     * @param $item
     *
     * @return string
     */
    protected function createRadioField($item)
    {
        $field =
            <<<EOD
            <div class="checkbox">
                <label>{!! Form::radio('%1\$s', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('%1\$s', '0', true) !!} No</label>
            </div>
EOD;

        return $this->wrapField($item, sprintf($field, $item['name']));
    }

}
