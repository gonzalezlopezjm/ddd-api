Feature: Obtaininig the ride services list
  In order to list ride services
  I want to get the ride services list and filter it

  Scenario: A ride services complete list
    Given I make a GET request to "/rideServices"
    Then the response status code should be 200
    And the response content should has 10 items

  Scenario: A ride services list filtered by vehicleType
    Given the query parameter "vehicleType" is "suv"
    And I make a GET request to "/rideServices"
    Then the response status code should be 200
    And the response content should has 3 items

  Scenario: A ride services list filtered by pickUp location name
    Given the query parameter "pickUp" is "angeles"
    And I make a GET request to "/rideServices"
    Then the response status code should be 200
    And the response content should has 2 items

  Scenario: A ride services list filtered by dropOff location name
    Given the query parameter "dropOff" is "museum"
    And I make a GET request to "/rideServices"
    Then the response status code should be 200
    And the response content should has 2 items

  Scenario: A ride services list filtered by serviceLocator
    Given the query parameter "serviceLocator" is "C91YQALO"
    And I make a GET request to "/rideServices"
    Then the response status code should be 200
    And the response content should has 1 items

  Scenario: A valid ride service UUID
    Given I make a GET request to "rideServices/ad1027e6-79d5-4840-82f4-1da50d3547a7"
    Then the response content should be
        """
        {
            "uuid": "ad1027e6-79d5-4840-82f4-1da50d3547a7",
            "pickUp": {
                "name": "Diorama-Museum of Bhagavad-gita",
                "latitude": 34.025233888034,
                "longitude": -118.39698631178
            },
            "dropOff": {
                "name": "The Culver Hotel",
                "latitude": 34.023846641827,
                "longitude": -118.39415395351
            },
            "vehicleType": "van",
            "serviceLocator": "C91YQALO",
            "createdAt": "2021-12-28T11:03:38+00:00"
        }
        """
    And the response status code should be 200

  Scenario: A not valid ride service UUID
    Given I make a GET request to "rideServices/ad1027e6-79d5-4840-82f4-1da50d3547a9"
    Then the response content should be empty
    And the response status code should be 404
