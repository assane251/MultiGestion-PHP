create table equipement (
id serial primary key,
etat varchar(50) not null,
disponible boolean not null
);

create table animal (
id serial primary key,
type varchar(50) not null,
age integer not null,
sante varchar(50) not null,
id_equipement integer references equipement(id)
)