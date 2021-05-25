use produtos;

create table produtos(
	idprod INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255),
    cor varchar(255)
);
drop table produtos;
drop table precos;


select * from produtos;

create table precos(
	idpreco INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	preco decimal (8,2)
); 

select *from precos;

select idprod,nome ,cor ,  e.preco from produtos p 
join precos e 
on  e.idpreco= p.idprod;

UPDATE produtos,precos SET nome='pano', cor='roxa', preco='50' where idprod ='1';
