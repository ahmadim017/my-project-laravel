<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new \App\User;
        $administrator->username = "ahamdim017";
        $administrator->name = "Ahmad Muhrani";
        $administrator->email = "ahmadmuhrani89@gmail.com";
        $administrator->roles = "ADMIN";
        $administrator->password = \Hash::make("sundulgan");
        $administrator->avatar = "gakada.png";
        $administrator->alamat = "Jln. Proklamasi RT.09 No.24 Penajam";
        $administrator->telpon = "089685211061";
        $administrator->save();

        $this->command->info("user berhasil di simpan");
    }
}
