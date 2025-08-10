-- salons table --

INSERT INTO salons (id, name, address, opening_date, no_employees_full_time, rep_name, rep_first_name)
VALUES
    (1, 'Escal’beauté', 'Corps-Nuds', '2019-01-01', 5, 'Lasalle', 'Bertrand'),
    (2, 'L’instant Pour Moi', 'Crevin', '2015-02-01', 10, 'Constance', 'Jane'),
    (3, 'Belles Des Champs', 'Le Petit-Fougeray', '2015-02-01', 8, 'Béret', 'Jaret'),
    (4, 'Divine Beaute', 'Bourgbarré', '2015-02-01', 2, 'Vantand', 'Eloîse'),
    (5, 'Institut Cybelle', 'Saint-Erblon', '2015-02-01', 5, 'Coulibaly', 'Jamilia'),
    (6, 'Beauté Détente', 'Laillé', '2015-02-01', 10, 'Mata', 'Fatou'),
    (7, 'Lady Bell', 'Janzé', '2015-02-01', 12, 'Page', 'Elie'),
    (8, 'Planet’esthétic', 'Janzé', '2015-02-01', 5, 'Kong', 'Sylvain'),
    (9, 'Caroll Beauté', 'Vern-sur-Seiche', '2015-02-01', 10, 'Connemara', 'Caroline'),
    (10, 'Institut de Beauté Dulcenae','rue Caumarti, Paris', '2013-06-01', 20, 'Chabal', 'Sebastien'),
    (11, 'See My Cosmetics','rue de la Trémoille', '2010-05-01', 20, 'Jacquemûr', 'Christiane'),
    (12, 'Sweating ','Quartier Montorgueil,', '2017-07-01', 20, 'Duvergé', 'Catherine'),
    (13, 'Le Palais d’Argan','rue du Fer à Moulin', '2019-09-01', 20, 'Cornet', 'Eloîse'),
    (14, 'Studio Beauté Romina Paris','Paris', '2018-06-01', 20, 'Mua Thai', 'Cindy'),
    (15, 'Institut Gisèle Delorme','rue La Boétie', '2020-07-01', 20, 'Mamode', 'Karen'),
    (16, 'Latitude Zen','rue Léon-Frot', '2010-07-01', 20, 'Vault', 'Sebastien'),
    (17, 'Institut Harmonie Bio''té', 'rue du Tage', '2009-08-01', 20, 'Paul', 'Frédérique'),
    (18, 'Centre Esthétique Beautyline ','Saint-Cloud', '2012-05-01', 20, 'Chapeau', 'Sebastien');


    -- Turnover table --

INSERT INTO turnover (id,salon_fk_id, date, amount, dept_region)
VALUES
    (1,1, '2025-08-31', 10000, 'Ille-et-Vilaine'),
    (2, 2, '2025-08-31', 12000, 'Ille-et-Vilaine'),
    (3, 5, '2025-08-31', 15000, 'Ille-et-Vilaine'),
    (4, 7, '2025-08-31', 16000, 'Ille-et-Vilaine'),
    (5, 6, '2025-08-31', 8000, 'Ille-et-Vilaine'),
    (6, 3, '2025-08-31', 9000, 'Ille-et-Vilaine'),
    (7, 4, '2025-08-31', 7000, 'Ille-et-Vilaine'),
    (8, 8, '2025-08-31', 7500, 'Ille-et-Vilaine'),
    (9, 9, '2025-08-31', 11000, 'Ille-et-Vilaine'),
    (10, 10, '2025-08-31', 25000, 'Ile-de-France'),
    (11, 13, '2025-08-31', 17000, 'Ile-de-France'),
    (12, 17, '2025-08-31', 12000, 'Ile-de-France'),
    (13, 12, '2025-08-31', 18000, 'Ile-de-France'),
    (14, 11, '2025-08-31',  35000, 'Ile-de-France'),
    (15, 14, '2025-08-31', 28000, 'Ile-de-France'),
    (16, 15, '2025-08-31', 24000, 'Ile-de-France'),
    (17, 18, '2025-08-31', 19000, 'Ile-de-France'),
    (18, 16, '2025-08-31', 19000, 'Ile-de-France');
