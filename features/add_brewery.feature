Feature: Add Brewery
  In order to add a brewery
  As a logged administrator
  I should be able to access the Add Brewery page and submit form

  Scenario: Add brewery
    When I am on "/admin/brewery/new"
    Then the response status code should be 200