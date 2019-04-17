# Usage Instructions

* The home page displays Enrolements data yearwise for different government schools in NSW
* The data can be filtered by code, School Wise and Year-wise count
* The data can be sorted by different fields
* Whenever there is difference in the number of records provied by NSW Government website the data will be automatically imported and a log will be created
* This log will be available only for the logged in users (use username: admin and password: admin)

Note: 
* Please run yii migration before starting the application 
* Time taken to complete this task is nearly 130 minutes

# Tech Assessment - Backend

## Overview
This exercise is designed to examine your ability to;

* Understand key requirements
* Quickly adapt to an unfamiliar environment
* Utilise third party libraries
* Implement effective tests
* Commit often

## Guidelines
* Keep track of your time
* Fork this repository
* Create a PR back to the repository once complete

## Tasks
* Using [Yii2](https://github.com/yiisoft/yii2-app-basic)
* Create a model and view that;
   * Collects the [NSW government school enrolments by head count (2004-2018)](https://data.cese.nsw.gov.au/data/dataset/nsw-government-school-enrolments-by-head-count)
   * Presents the above data in a useful way
   * Refreshes the data if it is older than a defined period
* Implement tests to validate key aspects of the above
* Add a method that allows a logged in user to view information about the dataset, (when it was last downloaded, how many records, etc).
* Provide (very) basic usage instructions

## Notes
Spend as much time as you like, but try to consider this as "a short excercise".
You may retain, remove or customise as much of the "basic" app as you feel necessary.
When submitting the PR, feel free to add commentary.
You may create and use a database for this process if you feel it is necessary, but you must use the [Yii2 Migrations](http://www.yiiframework.com/doc-2.0/guide-db-migrations.html) for table creation.

This assessment generally takes between 30 and 90 minutes to complete.
