Feature: Video management
	In order to be logged in
	As an existant admin
	I need to be able to login to admin

Rules: 
	A user could is connected to admin with ROLE_ADMIN

@web @remove_users
Scenario: Add a video
	Given there is an admin user "Bob" with password "Marley"
	And I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Add Video"
	Then I should see "Create Video"
	When I fill in the following:
	    | video_title 		| The Martian |
	    | video_price 		| 3           |
	    | video_description | blablabla   |
	When I press "Save changes"
	Then I should see "The Martian"


@web @remove_users
Scenario: Delete a video via editing it
	Given there is an admin user "Bob" with password "Marley"
	And I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Edit"
	Then I should see "Edit Video"
	When I press "Delete"
	Then I should not see "The Martian"


@web @remove_users
Scenario: Editing a movie title
	Given there is an admin user "Bob" with password "Marley"
	And I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Edit"
	Then I should see "Edit Video"
	When I fill in the following:
	    | video_title 		| Deadpool |
    Then I press "Save changes"
	Then I should see "Deadpool"


@web @remove_users
Scenario: Editing all the informations of a movie
	Given there is an admin user "Bob" with password "Marley"
	And I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Edit"
	Then I should see "Edit Video"
	When I fill in the following:
	    | video_title 		| Total Recall   |
	    | video_price 		| 3              |
	    | video_description | description    |
    When I select "Nov" from "video_release_date_date_month"
    When I select "23" from "video_release_date_date_day"
    When I select "2017" from "video_release_date_date_year"
    When I select "16" from "video_release_date_time_hour"
    When I select "45" from "video_release_date_time_minute"
    Then I press "Save changes"
	Then I should see "Total Recall"



@web @remove_users
Scenario: Wrongly edit price of a movie
	Given there is an admin user "Bob" with password "Marley"
	And I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Edit"
	Then I should see "Edit Video"
	When I fill in the following:
	    | video_price 		| bonjour              |
    Then I press "Save changes"
	Then I should see "This value is not valid."
	And I should see "Edit Video"


@web @remove_users
Scenario: Adding genre to a movie
	Given there is an admin user "Bob" with password "Marley"
	And I go to "/admin/"
	And I fill in the following:
	    | username  | Bob   |
	    | password  | Marley|
	When I press "_submit"
	Then I should see "Video"
	When I follow "Edit"
	Then I should see "Edit Video"
	When I select "Action" from "video_genre"
    Then I press "Save changes"
	Then the ".badge" element should contain "1"
	And I should see "Video"