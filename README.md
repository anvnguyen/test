# Installation instruction
- Install XAMPP stack on Linux
- Clone this source code to the htdocs folder
- Import initial database script to MySQL
- To this command to grant all permisson for the source folder: sudo chmod -R 777 test
- Browse to this address localhost/test

# Workflow
- At the first load, this project will import the csv file: /protected/data/test.csv into database named "chart"
- It shows line chart of the order data by default.
- Change the chart by selecting the values in dropdown box.

# Some techique 
- Yii PHP framework for this project
- Hightcharts for the chart display
- Use LOAD DATA INFILE of MySQL, so the insert time should be less than 1s https://dev.mysql.com/doc/refman/5.7/en/load-data.html
