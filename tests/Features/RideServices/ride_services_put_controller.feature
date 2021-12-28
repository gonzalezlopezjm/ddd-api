Feature: Update new ride service
  In order to have updated ride services
  I want to update a existant ride service

  Scenario: A valid ride service data
    Given I make a PUT request to "/rideServices/ad1027e6-79d5-4840-82f4-1da50d3547a7" with body
        """
        {
            "pickUp": {
                "name": "Levi's Stadium",
                "latitude": 37.403365470890,
                "longitude": -121.96944474223
            },
            "dropOff": {
                "name": "Koi Palace",
                "latitude": 37.419605525695,
                "longitude": -121.91553092353
            },
            "vehicleType": "suv"
        }
        """
    Then the response status code should be 200
    And I make a GET request to "/rideServices/ad1027e6-79d5-4840-82f4-1da50d3547a7"
    Then the response content should be
        """
        {
            "uuid": "ad1027e6-79d5-4840-82f4-1da50d3547a7",
            "pickUp": {
                "name": "Levi's Stadium",
                "latitude": 37.403365470890,
                "longitude": -121.96944474223
            },
            "dropOff": {
                "name": "Koi Palace",
                "latitude": 37.419605525695,
                "longitude": -121.91553092353
            },
            "vehicleType": "suv",
            "serviceLocator": "C91YQALO",
            "createdAt": "2021-12-28T11:03:38+00:00"
        }
        """
    Then the response status code should be 200


  Scenario: An invalid pickUp data
    Given I make a PUT request to "/rideServices/ad1027e6-79d5-4840-82f4-1da50d3547a7" with body
        """
        {
            "pickUp": {
                "name": "Levi's Stadium",
                "longitude": -121.96944474223
            }
        }
        """
    Then the response status code should be 400

  Scenario: An invalid vehicleType option
    Given I make a PUT request to "/rideServices/ad1027e6-79d5-4840-82f4-1da50d3547a7" with body
        """
        {
            "vehicleType": "cadillac"
        }
        """
    Then the response status code should be 400
