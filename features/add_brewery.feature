Feature: Add Brewery
  In order to add a brewery
  As a logged administrator
  I should be able to access the Add Brewery page and submit form

  Scenario: Add brewery page requires login
    When I am on "/admin/app/brewery/create"
    Then page loads successfully
    And I should be on "/login"

  Scenario: Add brewery loads successfully
    Given I am logged in as "admin@example.com"
    When I am on "/admin/app/brewery/create"
    Then the response status code should be 200

  Scenario: Create brewery has correct fields
    Given I am logged in as "admin@example.com"
    When I am on "/admin/app/brewery/create"
    Then the "Name" field should contain ""
    And the "Phone" field should contain ""
    And the "Phone" field should contain the attribute "type" with value="tel"
    And the "Webpage" field should contain ""
    And the "Street address1" field should contain ""
    And the "Street address2" field should contain ""
    And the "City" field should contain ""
    And the "State" field should contain ""
    And the "Postal code" field should contain ""

  Scenario: Create a brewery
    Given I am logged in as "admin@example.com"
    Given I am on "/admin/app/brewery/create"
    And I fill in "Name" with "Brewery 1"
    And I fill in "Phone" with "1234567890"
    And I fill in "Webpage" with "https://example.com"
    And I fill in "Street address1" with "street1"
    And I fill in "Street address2" with ""
    And I fill in "City" with "Saint Petersburg"
    And I select "FL" from "State"
    And I fill in "Postal code" with "33701"
    When I press "Create and return to list"
    Then I am on "/admin/app/brewery/list"
    And I should see "Brewery 1"

  Scenario: List Areas Of Responsibility
    Given I am logged in as "admin@example.com"
    When I am on "/admin/app/brewery/list"
    Then page loads successfully
    And the columns schema of the "table" table should match:
      | columns |
      |         |
      | Name    |
      | Phone   |
      | City    |
      | State   |