<?php
require_once 'WrongLoginException.php';
require_once 'WrongPasswordException.php';

class CheckPassword
{
    public static function check(string $login, string $password, string $confirmPassword): bool
    {
        foreach (str_split($login) as $letter) {
            if (is_int($letter))
                continue;
            if ($letter === '_' || $letter === '-')
                continue;
            if (ctype_alpha($letter))
                continue;
            return false;
        }
        try {
            if (strlen($login) < 5) {
                throw new WrongLoginException();
            }
            if ($password !== $confirmPassword) {
                throw new WrongPasswordException();
            }
        } catch (WrongLoginException $e) {
            echo 'incorrect login';
            return false;
        } catch (Exception $e) {
            return false;
        }
        return true;
    }
}