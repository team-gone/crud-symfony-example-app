Feature: Movies and TV show management
	In order to be log in
	As an existant admin
	I need to be able to login to admin

Rules: 
	A user could is connected to admin with ROLE_ADMIN

@web @remove_users
Scenario: Adding a movie/tv show to be available right now
	Given there is an admin user "Bob" with password "Marley"
	When I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	And I press "_submit"
	Then I should be on "/admin/"
	And I should see "EasyAdmin"