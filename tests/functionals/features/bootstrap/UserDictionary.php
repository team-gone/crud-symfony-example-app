<?php

namespace Tests\Functionals;

trait UserDictionary
{
    private $mail;
    private $username;

    /**
     * @Given there is an admin user :username with password :password
     */
    public function thereIsAnAdminUserWithPassword($username, $password)
    {
        $manager = $this->getContainer()->get('fos_user.user_manager');
        $mail = $username;

        $admin = $manager->findUserByEmail($mail);

        if (empty($admin)) {

            // Create an Admin User
            $user = new \AppBundle\Entity\User();// inherits form FOSUserBundle\Entity\User()
            $user->setUsername($username);
            $user->setPlainPassword($password);
            $user->setEmail($username);// required by FOSUserBundle
            $user->setEnabled(true); // add it manually otherwise you'll get "Account is disabled" error
            $user->setRoles(['ROLE_ADMIN']);

            // Store it in the database
            $this->objectManager->persist($user);
            $this->objectManager->flush();
        }

        $this->mail = $mail;
        $this->username = $username;

        return $this;
    }

    /**
     * @AfterScenario @remove_users
     */
    public function deleteUser()
    {
        $userManager = $this->getContainer()->get('fos_user.user_manager');
        $user = $this->getUserByEmail($this->mail);

        $delete = $userManager->deleteUser($user);

        return $delete;
    }

        public function getUserByEmail($email)
    {
        $userManager = $this->getContainer()->get('fos_user.user_manager');
        $user = $userManager->findUserByEmail($this->mail);

        return $user;
    }

}