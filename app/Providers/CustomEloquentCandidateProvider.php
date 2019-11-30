<?php

namespace App\Providers;

use App\Candidate;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;

class CustomEloquentCandidateProvider extends EloquentUserProvider
{
   public function validateCredentials(UserContract $user, array $credentials)
   {
       $plain = $credentials['password'];

       $candidate = Candidate::where('email', $credentials['email'])->first();
        $password = $candidate ? decrypt($candidate->password) : null; 
       if ($plain == $password) {
           return true;
       } else {
           return false;
       }


       // caso queira continuar autenticando pelo modo padrao do Laravel
       // ou seja, validar dos dois modos, utilize a linha de codigo abaixo
       // return parent::validateCredentials($user, $credentials);
   }

} 