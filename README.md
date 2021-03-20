# question 1 les membres du groupe
Mvondo Pierre
Hugo Vernet
Moussa Bakayoko

##########################################
# question 2 

#installation de composer

symfony composer require symfony/orm-pack
symfony composer require --dev symfony/maker-bundle
#creation de la base de donnee
symfony console doctrine:database:create
# creation de l'entité Inscription, Matiere,parcours,Semestre,


symfony console make:entity
#migration des entité vers la bd
symfony console make:migration
symfony console doctrine:migrations:migrate

###############################################

# question 3 : creation de la fixture avec faker
#inqtallation de faker
symfony composer require fakerphp/faker
# inqtallation de la fixture
symfony composer require orm-fixtures --dev
symfony composer require --dev doctrine/doctrine-fixtures-bundle
#creation de la fixture
symfony console make:fixture
# execution de la fixture afin d'inserer des données dans la bd
symfony console doctrine:fixtures:load

############################################
# question 4 : creation des page de visualisations
# # creation du controlleur
symfony console make:controller
#avec des ajouts des methodes creation,modifier,supprimer une annonce
# creation automatique d'un formulaire
symfony console make:form

#################################################

# question 5 : possibilité d'écrire les descriptions au format markdown

# on appel la classes et Interfaces données par l'autowiring
symfony console debug:autowiring --all
# Pour avoir le format Markdown on fait : 
symfony composer require cebe/markdown
#Ensuite on modifie la Classe Controller pour rajouter un parser de type Markdown, et on précise le nouveau service
#dans notre dossier config/dans le fichier services.yaml qpuis on rajoute la ligne
cebe\markdown\Markdown: ~

#################################################

# question 6 : Affichage des annonces par tri croissant 
# pour afficher par tri croissant on dans l'index.html.twig on rajoute la commande dans le for :

{% for annonces in annonce |sort((a, b) => a.prix <=> b.prix) %}


################################################

# question 7 Material disign 
# inpiration du site 
https://material.io/
# creation de :
App bars: top, Buttons
Card
formulaire

#############################################

# question 8 : creation de l'entité user
 # # pour creer l'entité user on fait :
symfony console make:user
 # # Création du module d’authentification
symfony console make:auth
# on modifie  public function onAuthenticationSuccess en rajoutant :
return new RedirectResponse($this->urlGenerator->generate('annonce_index'));
# Création d’un formulaire d’inscription avec la commande :
symfony console make:regislation-form 

###############################################

# question 11 : contraintes de validation 
# pour les contraintes de validations nous avont utiliser assert ans les classes User et Annonce :
use Symfony\Component\Validator\Constraints as Assert;

@Assert\Length(min=3,minMessage="le nombre de caracteres est inferieur a {{ limit }}")
@Assert\Length(max=30,minMessage="le nombre de caracteres est superieur a {{ limit }}")

@ORM\Entity(repositoryClass=UserRepository::class)
@UniqueEntity(fields={"nom"}, message="There is already an account with this nom")

@Assert\Length(min=3,minMessage="le nom saisie  est inferieur a {{ limit }}")
@Assert\Length(max=20,minMessage="le nom saisie est superieur a {{ limit }}")

@Assert\Length(min=6,minMessage="le mot de passe est trop court il doit avoir au moins {{ limit }} caracteres")
@Assert\Length(max=30,minMessage="le mot de passe est trop long il doit avoir au plus {{ limit }} caracteres")

###########################################

# question 9 : relation entre Annonce et User 

# pour creer la relation on a utiliser la relation ManyToOne .
ManyToOne
# ceci apres avoir rajouter l'attribut auteur dans l'entité Annonce

##############################################

# question 10  la création d’une annonce ne soit possible que par un utilisateur connecté
 # question ok