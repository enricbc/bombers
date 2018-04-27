> Projecte - Cicle Formatiu de Grau Superior de Desenvolupament d'Aplicacions Web (DAW)

**Taula de continguts**

- [Què és?](#què-és)
- [Qui?](#qui)
- [Laravel 5.6](#laravel-56)
	- [Descarregar](#descarregar)
	- [Instal·lació](#installació)
	- [Configuració](#configuració)
		- [.env](#env)
		- [Key](#key)
		- [Migracions (DB)](#migracions-db)
		- [Enviament de correus electrònics](#enviament-de-correus-electrònics)
	- [Assets](#assets)
	- [Servidor](#servidor)

# Què és?

**Bombers** és el projecte final del Cicle Formatiu de Grau Superior de _Desenvolupament d'Aplicacions Web (DAW)_, de l'[Institut Montsià](http://agora.xtec.cat/insmontsia/) (Amposta - Terres de l'Ebre).

# Qui?

Equip:
- [Andrés Moreno Rubio](https://www.linkedin.com/in/andr%C3%A9s-moreno-rubio-49ab1860/)
- [Enric Beltran Cano](https://www.linkedin.com/in/enric-beltran-cano-400264156/)
- [Roger Forner Fabre](https://www.linkedin.com/in/rogerforner/)

Professors:
- Alejandro Milián Sangüesa
- Carles Anyó Luna
- Toni Morant Fornés

# Laravel 5.6

El nostre projecte és duu a terme mitjançant el framework PHP [Laravel](https://laravel.com/).

## Descarregar

Pots descarregar el projecte des del repositori del GitHub escribint la següent comanda en la terminal.

```
$ git clone https://github.com/rogerforner/bombers.git
```

_És necessari tenir instal·lat [git](https://git-scm.com/)._

## Instal·lació

Un cop descarregat hem d'accedir al directori del projecte i instal·lar les dependències mitjançant **composer** i, també, **npm**.

```
$ composer install && npm install
```

_És necessari tenir instal·lat [composer](https://getcomposer.org/) i [npm](https://www.npmjs.com/get-npm)._

## Configuració

### .env

Un cop instal·lades les dependències copiarem el fitxer _.env.example_ i el renombrarem a **.env**.

```
$ cp .env.example .env
```

### Key

Per poder executar sense problemes l'aplicació web hem de generar una _key_. En farem servir la següent comanda artisan.

```
$ php artisan key:generate
```

### Migracions (DB)

Crearem una base de dades mitjançant el gestor que es disposi. Aquesta pot tenir el nom que sigui, per exemple, la podem anomenar _bombers_.

Un cop tinguem la base de dades creada, ens dirigirem al fitxer _.env_ i hi escriurem el nom d'aquesta, l'usuari que hi accedeix i la seva clau.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bombers
DB_USERNAME=root
DB_PASSWORD=root
```

_Depenent del projecte, es poden emplenar la resta de paràmetres de configuració, inclòs crear-ne de nous._

Un cop configurada la base de dades hem de dur endavant les migracions. Amb aquestes es crearan les taules.

```
$ php artisan migrate
```

### Enviament de correus electrònics

Per permetre l'enviament de correus electrònics, necessari, per posar-ne un exemple, per al registre d'usuaris/ies (verificació de email), és necessari disposar d'un compte [Mailtrap](https://mailtrap.io), [Mailgun](https://www.mailgun.com/), [Gmail](https://www.google.com/gmail/), etc. i emplenar les dades del següent apartat del _.env_.

```
MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
```

_Depenent del projecte, es poden emplenar la resta de paràmetres de configuració, inclòs crear-ne de nous._

## Assets

En el nostre projecte treballem amb fitxers JavaScript i SASS. Cada cop que en fem algun canvi, en aquests, s'ha de dur endavant alguna de les següents comandes per tal de que siguin efectius.

- Executar cada cop que es realitzin canvis.
```
$ npm run dev
```
- Deixar executant-se sense la preocupació d'haver-ho de fer nosaltres cada cop que realitzem algun canvi.
```
$ npm run watch
```
- Preparar els _assets_ per a producció (minificació).
```
$ npm run production
```

## Servidor

Si emprem _[Laragon](https://laragon.org/)_ no és necessari dur a terme la següent comanda, en cas contrari sí, doncs les vistes han de ser compilades i enviades a _/public_.

```
$ php artisan serve
```

_És important no aturar el servidor mentre es treballi amb l'aplicació web ja que, llavors, no visualitzariem els canvis que es realitzin en el front-end._
