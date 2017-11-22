Feature: Video management
	In order to be log in
	As an existant admin
	I need to be able to login to admin

Rules: 
	A user could is connected to admin with ROLE_ADMIN

@web
Scenario: Add a video
	Given I am on "/admin/?action=list&entity=Video&menuIndex=0&submenuIndex=-1&sortField=id&sortDirection=DESC&page=1"
	When I follow "Add Video"
	Then I should see "Create Video"