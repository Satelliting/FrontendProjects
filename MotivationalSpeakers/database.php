<?php
    # Database Credentials
    $dbhost = 'localhost';
    $dbname = 'database_name';
    $dbuser = 'database_user';
    $dbpass = 'database_pass';


    # Initial Connection to Database
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
    if(! $conn ) {
        die('Could not connect: ' . mysqli_error());
    }

    # This Runs During Initial Page Load
    function initialLoad($conn) {
        $sql = 'SELECT * FROM events';
        $result = mysqli_query($conn, $sql);
        $results = array();

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $results[] = $row;
            }
            return json_encode($results);
         } else {
            return false;
         }
    }
    
    # This Runs When Changes Are Made To The Form
    function formLoad($conn) {
        
        $time = $_GET['time'];
        $keyword = $_GET['keyword'];
        $location = $_GET['location'];
        $minLength = $_GET['minLength'];
        $maxLength = $_GET['maxLength'];
        $minCost = $_GET['minCost'];
        $maxCost = $_GET['maxCost'];
        $minSize = $_GET['minSize'];
        $maxSize = $_GET['maxSize'];
        
        #Time
        if ($time == 'past'){
            $timeSQL = '(now() >= eventDate)';
        }
        else {
            $timeSQL = '(now() <= eventDate)';
        }
        
        #Keyword
        if ($keyword != '') {
            $keyWordSQL = " AND (eventName LIKE '%".$keyword."%' OR eventLocation LIKE '%".$keyword."%' OR eventCity LIKE '%".$keyword."%')";
        }
        
        #Location
        if ($location != 'any') {
            $locationSQL = " AND (eventCity LIKE '%".$location."%')";
        }
        
        function minMax($dbValue, $minValue, $maxValue) {
            $sqlStatement = ' AND (';
            if ($minValue != 0) {
                $sqlStatement .= $dbValue.' >= '.$minValue;
            }
            if ($maxValue != 0) {
                $sqlStatement .= (strlen($sqlStatement) > 6) ? ' AND ' : '';
                $sqlStatement .= $dbValue.' <= '.$maxValue;
            }
            
            $sqlStatement .= ')';
            
            if ($sqlStatement == ' AND ()'){
                return '';
            }
            
            return $sqlStatement;
        }
        
        $lengthSQL = minMax('eventTime', $minLength, $maxLength);
        $costSQL   = minMax('eventCost', $minCost, $maxCost);
        $sizeSQL   = minMax('eventSize', $minSize, $maxSize);
        
        #SQL Statement
        $sql = "SELECT * FROM events WHERE " . $timeSQL . $keyWordSQL . $locationSQL . $lengthSQL . $costSQL . $sizeSQL;

        $result = mysqli_query($conn, $sql);
        $results = array();

         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
               $results[] = $row;
            }
            return json_encode($results);
         } else {
            return false;
         }
    }
    
    # Checks If Initial Page Load or Form Change
    if (empty($_GET)) {
        $json_data = initialLoad($conn);
    }
    else {
        $json_data = formLoad($conn);
    }
    
    # Inserts Contents Into Seperate JSON file (For Readability)
    file_put_contents('form.json', $json_data);
    
    # Closes Database Connection
    mysqli_close($conn);