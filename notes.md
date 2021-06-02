## Ce que j'ai appris
- en gros, l'objectif c'était faire WordPress inclure nos fichiers CSS enfant et parent, comme approprié 
- on s'est abordé la surface des actions en WordPress
- on a brièvement étudié la fonction important: ```wp_enqueue_scripts()```
- modifier les styles existants
  - pour modifier les styles existantes, le meilleur moyen c'est de copier les styles, aussi que la selecteur, de l'inspecteur; que c'est soit chrome, firefox etc.
  - coller les styles ici (vscode ou là où que l'on utilise), et les modifier comme desiré  
- créer les nouvelles styles, en crééant une nouvelle selecteur qui va cibler notre élément
  - sur WordPress, c'est processus est un peu compliqué, mais rien de trop difficile. il me faut juste y habituer
  
<br>


- je prends cette occasion pour prendre la premier defi du cours (nommé "Add Flair")
- l'objectif c'est de styler d'avantage, les pages, postes, etc, en utilisant ce que l'on a appris

<br>

**Qq'chose important à remarquer:**
- Au debut, mes styles css ne se rendait pas à WordPress à cause des complications des caches. 
- Mais, when I do a hard refresh, instead of the normal refresh, I can see my styles getting applied.
- Alors, The solution was to do a hard refresh, pour que WordPress peut démarrer avec une nouvelle cache vide