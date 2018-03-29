Feature: Access Control
  In order to access most of the functionality
  As a user
  I need to be able to log into the site
#
#  Background:
#    Given the following user are defined:
#      | email             | password | role             |
#      | admin@example.com | P@ssw0rd | ROLE_SUPER_ADMIN |

  Scenario: Secure areas requires login
    When I am on "/admin"
    Then page loads successfully
    And I should be on "/login"

  Scenario: User logs in and directed to correct page
    Given I am on "/login"
    When I fill in "Username" with "admin@example.com"
    And I fill in "Password" with "P@ssw0rd"
    And I press "Log in"
    Then page loads successfully
    When I am on "/admin"
    Then I should not see "Access Denied"
#    And I should see "Log out"