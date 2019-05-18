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
VALUES (1, 1, 'Computer', 50, 'box', '1st Quarter', 'Primary', 'Pending'),
(1, 1, 'Computer', 50, 'box', '2nd Quarter', 'Primary', 'Pending'),
(1, 2, 'Computer', 75, 'box', '3rd Quarter', 'Primary', 'Pending'),
(1, 2, 'Computer', 75, 'box', '4th Quarter', 'Primary', 'Pending');