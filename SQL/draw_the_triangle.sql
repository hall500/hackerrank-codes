/* 
P(R) represents a pattern drawn by Julia in R rows. The following pattern represents P(5):

* 
* * 
* * * 
* * * * 
* * * * *
Write a query to print the pattern P(20).
 */

DELIMITER //
CREATE PROCEDURE GeneratePattern(IN num_rows INT)
BEGIN
  DECLARE counter INT DEFAULT 1;
  DECLARE pattern VARCHAR(255) DEFAULT '*';

  WHILE counter <= num_rows DO
    SELECT pattern;
    SET pattern = CONCAT(pattern, ' *');
    SET counter = counter + 1;
  END WHILE;
END //
DELIMITER ;

CALL GeneratePattern(20);