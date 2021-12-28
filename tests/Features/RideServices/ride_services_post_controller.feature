Feature: Create new ride service
  In order to have ride services
  I want to create a new ride service

  Scenario: A valid ride service
    Given I make a POST request to "/rideServices" with body
        """
        {
            "pickUp": {
                "name": "Levi's Stadium",
                "latitude": 37.40336547089053,
                "longitude": -121.96944474223729
            },
            "dropOff": {
                "name": "Koi Palace",
                "latitude": 37.41960552569546,
                "longitude": -121.91553092353197
            },
            "vehicleType": "suv"
        }
        """
    Then the response content should be empty
    And the response status code should be 201

  Scenario: A valid ride service without vehicleType
    Given I make a POST request to "/rideServices" with body
        """
        {
            "pickUp": {
                "name": "Aloft Santa Clara",
                "latitude": 37.41785401336342,
                "longitude": -121.97634279459434
            },
            "dropOff": {
                "name": "Arista Networks, Inc.",
                "latitude": 37.41186672654457,
                "longitude": -121.9761410590744
            }
        }
        """
    Then the response content should be empty
    And the response status code should be 201

  Scenario: Invalid data without dropOff
    Given I make a POST request to "/rideServices" with body
        """
        {
            "pickUp": {
                "name": "LA Airport",
                "latitude": 43.323328001026354,
                "longitude": -5.684601750561194
            },
            "vehicleType": "suv"
        }
        """
    Then the response content should be
        """
        {
            "error": true,
            "message": "Property \"dropOff\" is required"
        }
        """
    And the response status code should be 400

  Scenario: Invalid data without pickUp
    Given I make a POST request to "/rideServices" with body
        """
        {
            "dropOff": {
                "name": "Conference center LA",
                "latitude": 43.29828175357426,
                "longitude": -5.713865286297821
            },
            "vehicleType": "suv"
        }
        """
    Then the response content should be
        """
        {
            "error": true,
            "message": "Property \"pickUp\" is required"
        }
        """
    And the response status code should be 400

  Scenario: Invalid data without name pickUp
    Given I make a POST request to "/rideServices" with body
        """
        {
            "pickUp": {
                "latitude": 43.323328001026354,
                "longitude": -5.684601750561194
            },
            "dropOff": {
                "name": "Conference center LA",
                "latitude": 43.29828175357426,
                "longitude": -5.713865286297821
            },
            "vehicleType": "suv"
        }
        """
    Then the response content should be
        """
        {
            "error": true,
            "message": "Location must contain \"name\" field"
        }
        """
    And the response status code should be 400

  Scenario: Invalid data without name pickUp
    Given I make a POST request to "/rideServices" with body
        """
        {
            "pickUp": {
                "name": "LA Airport",
                "longitude": -5.684601750561194
            },
            "dropOff": {
                "name": "Conference center LA",
                "latitude": 43.29828175357426,
                "longitude": -5.713865286297821
            },
            "vehicleType": "suv"
        }
        """
    Then the response content should be
        """
        {
            "error": true,
            "message": "Location must contain \"latitude\" field"
        }
        """
    And the response status code should be 400

  Scenario: Invalid data without name pickUp
    Given I make a POST request to "/rideServices" with body
        """
        {
            "pickUp": {
                "name": "LA Airport",
                "latitude": 43.323328001026354
            },
            "dropOff": {
                "name": "Conference center LA",
                "latitude": 43.29828175357426,
                "longitude": -5.713865286297821
            },
            "vehicleType": "suv"
        }
        """
    Then the response content should be
        """
        {
            "error": true,
            "message": "Location must contain \"longitude\" field"
        }
        """
    And the response status code should be 400
