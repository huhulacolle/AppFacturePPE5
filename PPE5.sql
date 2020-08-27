CREATE DATABASE crosl;
USE crosl;
Create Table LIGUE
	( 
	NumLigue integer(4),
	NomSport Varchar(30),
	Nom Varchar(40),
	Addrs Varchar(25),
	Ville Varchar(25),
	CodPost Varchar(15),
	Sport Varchar(10),
	PRIMARY KEY (NumLigue)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;
	
Create Table Prestations
	(
	NumPrestation integer(4),
	Nomtype Varchar(30),
	NomMat Varchar(30),
	Prix Decimal(5,2),
	PRIMARY KEY (Nomtype)
	)ENGINE=InnoDB DEFAULT CHARSET=utf8;

Create Table Facture 
(
	idFacture integer(4),
	NumLigue integer(4),
	DateDeb date,
	DateEcheance date,
	PRIMARY KEY (idFacture)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

Create Table ContenuFacture
(
	idFacture integer(4),
	Nomtype Varchar(30),
	Qte integer(3)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

	
Insert Into LIGUE Values (411007,'Ligue Loraine de Escrime','Valerie LAHEURTE','72 Avenue Millies Lacroix',' Echirolles','38130','Escrime');
Insert Into LIGUE Values (411008,'Ligue Loraine de Football','Pierre LENOIR','2 Chemin Des Bateliers','Annecy','74000','Football');
Insert Into LIGUE Values (411009,'Ligue Loraine de Basket','Mohamed BOURGARD',"99 rue de l'Epeule",'Rouen','76100','Basket');
Insert Into LIGUE Values (411010,'Ligue Loraine de Baby-Foot','Monsieur Sylvain Delahousse','66 rue de Penthievre','Privas','07000','Baby-Foot');

Insert into Prestations Values (1,'AFFRAN','Affranchissement',3.330);
Insert into Prestations Values (2,'PHOTOCOULEUR','Photocopies couleur',0.24);
Insert into Prestations Values (3,'PHOTON&B','Photocopies Noir et Blanc',0.055);
Insert into Prestations Values (4,'TRACEUR','Utilisation du traceur',0.356);