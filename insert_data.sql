### Insert Stadiums
insert into Stadiums values ('5e52dfe895673', 'Kingston', 'Sarauders Stadium', 15000);
insert into Stadiums values ('5e52e05faafc5', 'Richmond', 'Karauders Stadium', 25000);
insert into Stadiums values ('5e52e05f27c04', 'Surbiton', 'Marauders Stadium', 96000);
insert into Stadiums values ('5e52e05f27c12', 'Central London', 'Carauders Stadium', 6000);
insert into Stadiums values ('5e52e05f27c22', 'Liverpool', 'Larauders Stadium', 26000);
insert into Stadiums values ('5e52e05f22c23', 'Brighton', 'Tarauders Stadium', 42000);
insert into Stadiums values ('5e52e35f27c21', 'Bath', 'Qarauders Stadium', 31000);
insert into Stadiums values ('5e56423ca6197', 'Kingston', 'Warauders Stadium', 31000);
insert into Stadiums values ('5e56423e2bfe0', 'Fetchley', 'Earauders Stadium', 31000);
insert into Stadiums values ('5e56423ed3a99', 'New Cross', 'Aarauders Stadium', 31000);
insert into Stadiums values ('5e56423f56b73', 'London Bridge', 'Garauders Stadium', 31000);
insert into Stadiums values ('5e56423fc79fc', 'Richmond', 'Harauders Stadium', 31000);
insert into Stadiums values ('5e564240b241d', 'Twickenham', 'Jarauders Stadium', 31000);
insert into Stadiums values ('5e5642403e4d8', 'Manchester', 'Narauders Stadium', 31000);
insert into Stadiums values ('5e5642426c1ba', 'Scotland', 'Barauders Stadium', 31000);
insert into Stadiums values ('5e5642445cda8', 'Galler', 'Varauders Stadium', 31000);


### Insert Teams
insert into Teams values ('5e52e1430caaa', 'Marauders', '5e52e05f27c04');
insert into Teams values ('5e52e1430cbbb', 'Larauders', '5e52e05f27c22');
insert into Teams values ('5e52e1430cbbc', 'Carauders', '5e52e05f27c12');
insert into Teams values ('5e52e1430cbbd', 'Karauders', '5e52e05faafc5');
insert into Teams values ('5e52e1430cbbe', 'Sarauders', '5e52dfe895673');
insert into Teams values ('5e52e1430cbbf', 'Tarauders', '5e52e05f22c23');
insert into Teams values ('5e5643e7a4383', 'Qarauders', '5e52e35f27c21');
insert into Teams values ('5e5643e72d2a9', 'Warauders', '5e56423ca6197');
insert into Teams values ('5e5643e6bc9df', 'Earauders', '5e56423e2bfe0');
insert into Teams values ('5e5643e5c8c4f', 'Aarauders', '5e56423ed3a99');
insert into Teams values ('5e5643e58bc89', 'Garauders', '5e56423f56b73');
insert into Teams values ('5e5643e351cb7', 'Harauders', '5e56423fc79fc');
insert into Teams values ('5e5643e397fe3', 'Jarauders', '5e564240b241d');
insert into Teams values ('5e5643e3f3c38', 'Narauders', '5e5642403e4d8');
insert into Teams values ('5e5643e514bbb', 'Barauders', '5e5642426c1ba');
insert into Teams values ('5e5643e551c55', 'Varauders', '5e5642445cda8');


### Insert Matches
insert into Matches values ('5e52e143df52b', '5e52e1430caaa', '2020-02-05', 40, 2, 0);
insert into Matches values ('5e52e14289c31', '5e52e1430cbbb', '2020-02-04', 40, 1, 1);
insert into Matches values ('5e52e14240986', '5e52e1430cbbc', '2020-02-04', 30, 1, 1);
insert into Matches values ('5e52e141e564b', '5e52e1430cbbd', '2020-02-04', 40, 2, 0);
insert into Matches values ('5e52e1419c295', '5e52e1430cbbe', '2020-02-04', 50, 1, 1);
insert into Matches values ('5e52e1414cbae', '5e52e1430cbbf', '2020-02-06', 60, 3, 1);
insert into Matches values ('5e52e14100868', '5e52e1430cbbd', '2020-02-06', 70, 1, 0);
insert into Matches values ('5e52e140ae767', '5e5643e5c8c4f', '2020-02-06', 70, 1, 1);
insert into Matches values ('5e52e1405f206', '5e5643e551c55', '2020-02-04', 70, 1, 1);
insert into Matches values ('5e52e14012d5f', '5e5643e58bc89', '2020-02-04', 50, 2, 0);
insert into Matches values ('5e52e13f622fd', '5e5643e397fe3', '2020-02-04', 100, 1, 1);
insert into Matches values ('5e52e13f0fcc8', '5e5643e7a4383', '2020-02-01', 100, 1, 0);
insert into Matches values ('5e52e13eb496d', '5e5643e514bbb', '2020-02-01', 50, 3, 1);
insert into Matches values ('5e52e13e15df7', '5e5643e3f3c38', '2020-02-01', 50, 1, 1);


### Insert Tickets of tlherysr
insert into Tickets values ('5e52e1430caaa', '5e52e1430cbbb', (select id from Users where username='talhaeryasar'), 'A1', 50);
insert into Tickets values ('5e52e1430caab', '5e52e141e564b', (select id from Users where username='talhaeryasar'), 'A2', 60);
insert into Tickets values ('5e52e1430caac', '5e52e14012d5f', (select id from Users where username='talhaeryasar'), 'A3', 70);