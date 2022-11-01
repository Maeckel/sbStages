use sbRE;

INSERT INTO animateur values( 1 , 'FREJ' , 'Hilda' );
INSERT INTO animateur values( 2 , 'ALEXANDER' , 'Dimitri' );
INSERT INTO animateur values( 3 , 'VESTRA' , 'Cyril' );

INSERT INTO specialiste values( 1 , 'BERN' , 'Guinivere' );
INSERT INTO specialiste values( 2 , 'RIGEL' , 'Alm' );

INSERT INTO client values( 1 , 'NUVELLE' , 'Constance' );
INSERT INTO client values( 2 , 'MAJOR' , 'Bob' );
INSERT INTO client values( 3 , 'ROCHARD' , 'Pierre' );
INSERT INTO client values( 4 , 'RUFUS' , 'Timmy' );
INSERT INTO client values( 5 , 'SAPHIR' , 'Flora' );

INSERT INTO stage values( 1 , 3 , '07/03/2022' , '7' );
INSERT INTO stage values( 2 , 2 , '12/10/2022' , '30' );
INSERT INTO stage values( 3 , 1 , '17/10/2022' , '30' );

INSERT INTO stage_client values( 1 , 3 );
INSERT INTO stage_client values( 2 , 2 );
INSERT INTO stage_client values( 3 , 5 );
INSERT INTO stage_client values( 1 , 4 );
INSERT INTO stage_client values( 2 , 1 );

INSERT INTO stage_specialiste values( 1 , 2 , 35 );
INSERT INTO stage_specialiste values( 2 , 1 , 72 );


