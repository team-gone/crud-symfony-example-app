Feature: Genre management
	In order to be log in
	As an existant admin
	I need to be able to login to admin

Rules: 
	A user could is connected to admin with ROLE_ADMIN

@web @remove_users
Scenario: Add genre.
	Given there is an admin user "Bob" with password "Marley"
	When I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Genre"
	Then I should see "Genre"
	When I follow "Add Genre"
	And I fill in the following:
		| genre_title  | Comedie   |
	    | genre_description | film peur |
	When I press "Save changes"
	Then I should see "Genre"
	And I should see "Comedie"

@web @remove_users
Scenario: Editing description genre.
	Given there is an admin user "Bob" with password "Marley"
	When I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Genre"
	Then I should see "Genre"
	When I follow "Edit"
	Then I should see "Edit Genre"
	And I fill in the following:
		| genre_title  | Comedie   |
	    | genre_description | film qui fait trop peur |
	When I press "Save changes"
	Then I should see "Genre"

@web @remove_users
Scenario: Editing title genre.
	Given there is an admin user "Bob" with password "Marley"
	When I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Genre"
	Then I should see "Genre"
	When I follow "Edit"
	Then I should see "Edit Genre"
	And I fill in the following:
		| genre_title  | Fantastique   |
	    | genre_description | film qui fait trop peur |
	When I press "Save changes"
	Then I should see "Genre"

@web @remove_users
Scenario: Cancel editing title genre.
	Given there is an admin user "Bob" with password "Marley"
	When I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Genre"
	Then I should see "Genre"
	When I follow "Edit"
	Then I should see "Edit Genre"
	And I fill in the following:
		| genre_title  | Horreur   |
	    | genre_description | film qui fait trop peur |
	When I follow "Back to listing"
	Then I should not see "Horreur"

@web @remove_users
Scenario: Delete genre.
	Given there is an admin user "Bob" with password "Marley"
	When I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Genre"
	Then I should see "Genre"
	When I follow "Edit"
	Then I should see "Edit Genre"
	When I press "Delete"
	Then I should see "Genre"
