<?php
use App\Setting;
use Illuminate\Support\Facades\Auth;

if (Auth::check()) {

  $setting = Setting::where('user_id', Auth::id())->first();

}

?>

<?php

if($setting->language == 1)
{

if (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) == ('fr' || 'en')) {
  /* FRENCH VERSION */
  return [
    "Dashboard" => "Tableau de bord",
    "eCommerce" => "commerce électronique",
    "Analytics" => "Analytique",
    "Apps" => "applications",
    "Email" => "Email",
    "Chat" => "Bavarder",
    "Todo" => "Faire",
    "Calendar" => "Calendrier",
    "Kanban" => "Kanban",
    "Invoice" => "Facture d'achat",
    "Invoice List" => "Liste des factures",
    "Invoice" => "Facture d'achat",
    "Invoice Edit" => "Modification de facture",
    "Invoice Add" => "Ajouter une facture",
    "File Manager" => "Gestionnaire de fichiers",
    "UI" => "UI",
    "Content" => "Contenu",
    "Grid" => "la grille",
    "Typography" => "Typographie",
    "Text Utilities" => "Utilitaires de texte",
    "Syntax Highlighter" => "Surligneur de syntaxe",
    "Helper Classes" => "Classes d'assistance",
    "Colors" => "Couleurs",
    "Icons" => "Icônes",
    "BoxIcons" => "BoxIcons",
    "LivIcons" => "LivIcons",
    "Card" => "Carte",
    "Basic" => "De base",
    "Card Actions" => "Actions de la carte",
    "Widgets" => "Widgets",
    "Components" => "Composants",
    "Alerts" => "Alertes",
    "Buttons" => "Boutons",
    "Breadcrumbs" => "Chapelure",
    "Carousel" => "Carrousel",
    "Collapse" => "Effondrer",
    "Dropdowns" => "Liste déroulante",
    "List Group" => "Groupe de listes",
    "Modals" => "Modals",
    "Pagination" => "Pagination",
    "Navbar" => "Navbar",
    "Tabs Component" => "Composant Tabs",
    "Pills Component" => "Composant pilules",
    "Tooltips" => "Info-bulles",
    "Popovers" => "popovers",
    "Badges" => "Insignes",
    "Pill Badges" => "Insignes de pilule",
    "Progress" => "Le progrès",
    "Media Objects" => "Objets multimédias",
    "Spinner" => "Fileur",
    "Toasts" => "Toasts",
    "Extra Components" => "Composants supplémentaires",
    "Avatar" => "Avatar",
    "Chips" => "frites",
    "Divider" => "Séparateur",
    "Extensions" => "Extensions",
    "Sweet Alert" => "Sweet Alert",
    "Toastr" => "Toastr",
    "NoUi Slider" => "NoUi Slider",
    "Drag & Drop" => "Glisser-déposer",
    "Tour" => "Tour",
    "Swiper" => "Swiper",
    "Treeview" => "Treeview",
    "Block-UI" => "Block-UI",
    "Media Player" => "Lecteur multimédia",
    "Miscellaneous" => "Divers",
    "i18n" => "i18n",
    "Forms & Tables" => "Formulaires et tableaux",
    "Form Elements" => "Éléments de formulaire",
    "Input" => "Contribution",
    "Input Groups" => "Groupes d'entrées",
    "Number Input" => "Entrée de numéro",
    "Select" => "Sélectionner",
    "Radio" => "Radio",
    "Checkbox" => "Case à cocher",
    "Switch" => "Commutateur",
    "Textarea" => "Textarea",
    "Quill Editor" => "Éditeur de plumes",
    "File Uploader" => "Téléchargeur de fichiers",
    "Date & Time Picker" => "Sélecteur de date et d'heure",
    "Form Layout" => "Présentation du formulaire",
    "Form Wizard" => "Assistant de formulaire",
    "Form Validation" => "Validation de formulaire",
    "Form Repeater" => "Répétiteur de formulaire",
    "Table" => "Table",
    "Table extended" => "Table étendue",
    "Datatable" => "Datatable",
    "Pages" => "Pages",
    "User Profile" => "Profil de l'utilisateur",
    "FAQ" => "FAQ",
    "Knowledge Base" => "Base de connaissances",
    "Search" => "Chercher",
    "Account Settings" => "Paramètres du compte",
    "User" => "Utilisateur",
    "List" => "liste",
    "View" => "Vue",
    "Edit" => "Éditer",
    "Starter kit" => "Kit de démarrage",
    "1 column" => "1 colonne",
    "2 columns" => "2 colonnes",
    "Fixed navbar" => "Barre de navigation fixe",
    "Fixed layout" => "Disposition fixe",
    "Static layout" => "Disposition statique",
    "Authentication" => "Authentification",
    "Login" => "S'identifier",
    "Register" => "S'inscrire",
    "Forgot Password" => "Mot de passe oublié",
    "Reset Password" => "réinitialiser le mot de passe",
    "Lock Screen" => "Écran verrouillé",
    "Miscellaneous" => "Divers",
    "Coming Soon" => "Bientôt disponible",
    "404" => "404",
    "500" => "500",
    "Not Authorized" => "Pas autorisé",
    "Maintenance" => "Entretien",
    "Charts & Maps" => "Graphiques et cartes",
    "Apex" => "Sommet",
    "Chartjs" => "Chartjs",
    "Chartist" => "Chartiste",
    "Google Maps" => "Google Maps",
    "Others" => "Autres",
    "Menu Levels" => "Niveaux de menu",
    "Second Level" => "Deuxième niveau",
    "Second Level" => "Deuxième niveau",
    "Third Level" => "Troisième niveau",
    "Third Level" => "Troisième niveau",
    "Disabled Menu" => "Menu désactivé",
    "Documentation" => "Documentation",
    "Raise Support" => "Augmenter le soutien",
    "Floating navbar" => "Navbar flottant",
    "Error" => "Erreur",
    "Charts" => "Graphiques",
    "Access Control" => "Contrôle d'accès",
  ];
}

} else {
  /* ENGLISH VERSION */
  return [
    "Dashboard" => "Dashboard",
    "eCommerce" => "eCommerce",
    "Analytics" => "Analytics",
    "Apps" => "Apps",
    "Email" => "Email",
    "Chat" => "Chat",
    "Todo" => "Todo",
    "Calendar" => "Calendar",
    "Kanban" => "Kanban",
    "Invoice" => "Invoice",
    "Invoice List" => "Invoice List",
    "Invoice" => "Invoice",
    "Invoice Edit" => "Invoice Edit",
    "Invoice Add" => "Invoice Add",
    "File Manager" => "File Manager",
    "UI" => "UI",
    "Content" => "Content",
    "Grid" => "Grid",
    "Typography" => "Typography",
    "Text Utilities" => "Text Utilities",
    "Syntax Highlighter" => "Syntax Highlighter",
    "Helper Classes" => "Helper Classes",
    "Colors" => "Colors",
    "Icons" => "Icons",
    "BoxIcons" => "BoxIcons",
    "LivIcons" => "LivIcons",
    "Card" => "Card",
    "Basic" => "Basic",
    "Card Actions" => "Card Actions",
    "Widgets" => "Widgets",
    "Components" => "Components",
    "Alerts" => "Alerts",
    "Buttons" => "Buttons",
    "Breadcrumbs" => "Breadcrumbs",
    "Carousel" => "Carousel",
    "Collapse" => "Collapse",
    "Dropdowns" => "Dropdowns",
    "List Group" => "List Group",
    "Modals" => "Modals",
    "Pagination" => "Pagination",
    "Navbar" => "Navbar",
    "Tabs Component" => "Tabs Component",
    "Pills Component" => "Pills Component",
    "Tooltips" => "Tooltips",
    "Popovers" => "Popovers",
    "Badges" => "Badges",
    "Pill Badges" => "Pill Badges",
    "Progress" => "Progress",
    "Media Objects" => "Media Objects",
    "Spinner" => "Spinner",
    "Toasts" => "Toasts",
    "Extra Components" => "Extra Components",
    "Avatar" => "Avatar",
    "Chips" => "Chips",
    "Divider" => "Divider",
    "Extensions" => "Extensions",
    "Sweet Alert" => "Sweet Alert",
    "Toastr" => "Toastr",
    "NoUi Slider" => "NoUi Slider",
    "Drag & Drop" => "Drag & Drop",
    "Tour" => "Tour",
    "Swiper" => "Swiper",
    "Treeview" => "Treeview",
    "Block-UI" => "Block-UI",
    "Media Player" => "Media Player",
    "Miscellaneous" => "Miscellaneous",
    "i18n" => "i18n",
    "Forms & Tables" => "Forms & Tables",
    "Form Elements" => "Form Elements",
    "Input" => "Input",
    "Input Groups" => "Input Groups",
    "Number Input" => "Number Input",
    "Select" => "Select",
    "Radio" => "Radio",
    "Checkbox" => "Checkbox",
    "Switch" => "Switch",
    "Textarea" => "Textarea",
    "Quill Editor" => "Quill Editor",
    "File Uploader" => "File Uploader",
    "Date & Time Picker" => "Date & Time Picker",
    "Form Layout" => "Form Layout",
    "Form Wizard" => "Form Wizard",
    "Form Validation" => "Form Validation",
    "Form Repeater" => "Form Repeater",
    "Table" => "Table",
    "Table extended" => "Table extended",
    "Datatable" => "Datatable",
    "Pages" => "Pages",
    "User Profile" => "User Profile",
    "FAQ" => "FAQ",
    "Knowledge Base" => "Knowledge Base",
    "Search" => "Search",
    "Account Settings" => "Account Settings",
    "User" => "User",
    "List" => "List",
    "View" => "View",
    "Edit" => "Edit",
    "Starter kit" => "Starter kit",
    "1 column" => "1 column",
    "2 columns" => "2 columns",
    "Fixed navbar" => "Fixed navbar",
    "Fixed layout" => "Fixed layout",
    "Static layout" => "Static layout",
    "Authentication" => "Authentication",
    "Login" => "Login",
    "Register" => "Register",
    "Forgot Password" => "Forgot Password",
    "Reset Password" => "Reset Password",
    "Lock Screen" => "Lock Screen",
    "Miscellaneous" => "Miscellaneous",
    "Coming Soon" => "Coming Soon",
    "404" => "404",
    "500" => "500",
    "Not Authorized" => "Not Authorized",
    "Maintenance" => "Maintenance",
    "Charts & Maps" => "Charts & Maps",
    "Charts" => "Charts",
    "Apex" => "Apex",
    "Chartjs" => "Chartjs",
    "Chartist" => "Chartist",
    "Google Maps" => "Google Maps",
    "Others" => "Others",
    "Menu Levels" => "Menu Levels",
    "Second Level" => "Second Level",
    "Second Level" => "Second Level",
    "Third Level" => "Third Level",
    "Third Level" => "Third Level",
    "Disabled Menu" => "Disabled Menu",
    "Documentation" => "Documentation",
    "Raise Support" => "Raise Support",
    "Floating navbar" => "Floating navbar",
    "Error" => "Error",
    "Access Control" => "Access Control",
  ];
}
