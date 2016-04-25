<?php

namespace App\Console\Commands\Admin;

use File;
use Illuminate\Console\Command;

class Generate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:generate
                            {name : The name of the Crud.}
                            {--fields= : Fields name for the form & model.}
                            {--route=yes : Include Crud route to routes.php? yes|no.}
                            {--pk=id : The name of the primary key.}
                            {--view-path=admin : The name of the view path.}
                            {--namespace=admin : Namespace of the controller.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Crud including controller, model, views & migrations.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');

        $controllerNamespace = ($this->option('namespace')) ? $this->option('namespace') . '\\' : '';

        if ($this->option('fields')) {
            $fields = $this->option('fields');
            $primaryKey = $this->option('pk');
            $viewPath = $this->option('view-path');

            $fieldsArray = explode(',', $fields);
            $requiredFields = '';
            $requiredFieldsStr = '';

            foreach ($fieldsArray as $item) {
                $fillableArray[] = preg_replace("/(.*?):(.*)/", "$1", trim($item));

                $itemArray = explode(':', $item);
                $currentField = trim($itemArray[0]);
                $requiredFieldsStr .= (isset($itemArray[2])
                    && (trim($itemArray[2]) == 'req'
                        || trim($itemArray[2]) == 'required'))
                ? "'$currentField' => 'required', " : '';
            }

            $commaSeparetedString = implode("', '", $fillableArray);
            $fillable = "['" . $commaSeparetedString . "']";

            $requiredFields = ($requiredFieldsStr != '') ? "[" . $requiredFieldsStr . "]" : '';

            $this->call('admin:controller', ['name' => $controllerNamespace . str_plural($name) , '--crud-name' => $name, '--view-path' => $viewPath, '--fields' => $commaSeparetedString, '--required-fields' => $requiredFields]);
            $this->call('admin:model', ['name' => $name, '--fillable' => $fillable, '--table' => str_plural(strtolower($name))]);
            $this->call('admin:migration', ['name' => str_plural(strtolower($name)), '--schema' => $fields, '--pk' => $primaryKey]);
            $this->call('admin:view', ['name' => $name, '--fields' => $fields, '--view-path' => $viewPath]);
        } else {
            $this->call('make:controller', ['name' => $controllerNamespace . $name . 'Controller']);
            $this->call('make:model', ['name' => $name]);
        }

        // Updating the Http/routes.php file
        $routeFile = app_path('Http/routesAdmin.php');
        if (file_exists($routeFile) && (strtolower($this->option('route')) === 'yes')) {
            $controller = 'admin/' . str_plural(strtolower($name));

            $isAdded = File::append($routeFile, "\nRoute::resource('" . $controller . "', '" . str_plural($name) . "');");
            if ($isAdded) {
                $this->info('Crud/Resource route added to ' . $routeFile);
            } else {
                $this->info('Unable to add the route to ' . $routeFile);
            }
        }
        // Updating the resources/views/admin/templates/menu.blade.php file
        $menuFile = base_path() . '/resources/views/admin/partials/menu.blade.php';
        if (file_exists($menuFile)) {
            $controller = 'admin/' . str_plural(strtolower($name));

            $file = File::get($menuFile);
            $str = "<li><a href=\"{{ route('admin.users.index') }}\"><i class=\"fa fa-wrench\"></i> ". str_plural($name)."</a></li>
            <!--newItens-->";
            $str = str_replace('<!--newItens-->', $str, $file);
            File::put($menuFile, $str);
            $this->info($name . 'added added to ' . $menuFile);
        }
    }

}
