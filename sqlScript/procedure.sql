-- SELECT USERS
-- Query = "CALL get_users_byRegDate";

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_users_byRegDate`()
  BEGIN
    SELECT * FROM user ORDER BY userRegDate DESC LIMIT 5;
  END$$
DELIMITER ;

-- SELECT ABOUT
-- Query = "CALL proc_get_about";

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_get_about`()
  BEGIN
    SELECT * FROM about;
  END$$
DELIMITER ;

-- SELECT CATEGORY
-- Query = "CALL proc_get_category";

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `proc_get_category`()
  BEGIN
    SELECT * FROM category ORDER BY categoryOrderID ASC;
  END$$
DELIMITER ;