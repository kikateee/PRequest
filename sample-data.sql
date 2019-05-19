INSERT INTO cost_centers (costcenter_name, section_name)
VALUES ('IT Department', 'College of Computer Studies'),
('IS Department', 'College of Computer Studies'),
('CS Department', 'College of Computer Studies'),
('Filipino Department', 'College of Arts and Social Sciences'),
('Political Science Department', 'College of Arts and Social Sciences'),
('Psychology Department', 'College of Arts and Social Sciences'),
('English Department', 'College of Arts and Social Sciences');

INSERT INTO fund_sources (source)
VALUES ('GAA'), ('Income'), ('Fiduciary');

INSERT INTO items (costcenter_id, fundsource_id, description, stock, unit_of_issue, quarter, type, remark)
VALUES 
-- College of Computer Studies
(1, 1, 'IBM Laptop', 100, 'box', '1st Quarter', 'Primary', 'Pending'),
(1, 1, 'HP Desktop Computer', 100, 'box', '2nd Quarter', 'Primary', 'Pending'),
(2, 2, 'Lenovo Desktop Computer', 100, 'box', '3rd Quarter', 'Primary', 'Pending'),
(2, 2, 'Acer Desktop Computer', 100, 'box', '4th Quarter', 'Primary', 'Pending'),
(3, 3, 'Logitech Keyboard', 400, 'piece', '1st Quarter', 'Primary', 'Pending'),
(3, 3, 'A4Tech Mouse', 400, 'piece', '2nd Quarter', 'Primary', 'Pending'),

-- College of Arts and Social Sciences
(4, 1, 'HP Deskjet Printer', 5, 'box', '3rd Quarter', 'Supplemental', 'Pending'),
(4, 1, 'Brother Printer', 5, 'box', '4th Quarter', 'Supplemental', 'Pending'),
(5, 2, 'File XL Container', 20, 'box', '1st Quarter', 'Supplemental', 'Pending'),
(5, 2, 'File M Container', 20, 'box', '2nd Quarter', 'Supplemental', 'Pending'),
(6, 3, 'Long Size Bondpaper', 500, 'ream', '3rd Quarter', 'Supplemental', 'Pending'),
(6, 3, 'Short Size Bondpaper', 500, 'ream', '4th Quarter', 'Supplemental', 'Pending'),
(7, 1, 'Brown Envelope', 150, 'box', '1st Quarter', 'Supplemental', 'Pending'),
(7, 1, 'Transparent Envelope', 150, 'box', '2nd Quarter', 'Supplemental', 'Pending');