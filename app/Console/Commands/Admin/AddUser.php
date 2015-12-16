<?php

namespace App\Console\Commands\Admin;

use Illuminate\Console\Command;
use Validator;

class AddUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:add-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

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
        $input = [];
        $input['name'] = $this->ask('Name');
        $input['email'] = $this->ask('E-mail');
        $input['role'] = $this->choice('Role?', ['admin', 'manager', 'user'], false);
        $input['password'] = $this->secret('Password');
        $input['confirm_password'] = $this->secret('Confirm password');

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,manager,user',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors()->all('• :message') as $message) {
              $this->error($message);
            }
            $this->call('admin:add-user', []);
        } else {
            $input['password'] = \Hash::make($input['password']);
            \App\User::create($input);
            $this->info('Usuário criado com sucesso');
        }
    }
}
