Feature: Homepage

  Scenario: Loading Homepage
    Given I am on "/app_dev.php/"
    Then I should see "ALTAWAY"

  Scenario: Menu list_offers
    Given I am on "/app_dev.php/"
    When I follow "list_offers"
    Then I should see "Nos offres"

  Scenario: login
    Given I am on "app_dev.php/"
    When I follow "Connexion"
    Then the response should contain "form-signin"
    When I fill in "_username" with "admin"
    And I fill in "_password" with "admin"
    And I press "Connexion"
    Then I should see "admin"