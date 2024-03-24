# Task Module
## Management of tasks

### Dependencies

#### Modules

1. [**App**](https://github.com/DviDev/app-module) - Gerenciamento de informações ```*genéricas```

> 🤖 Informações genéricas geralmente não se enquadram em nenhum módulo.

2. [**Workspace**](https://github.com/DviDev/app-module) - Categorização via ```Espaços``` de trabalho

> 🤖 Espaços de trabalhos ajudam a organizar a informação.

### Relation

```mermaid
graph TD;
    Task-->TaskComments[Comments];
    Task-->Works-->WorkComments[Comments];
    Task-->Links-->LinkComments[Comments];
    Task-->Posts-->PostComments[Comments];
```

### Actions
```mermaid
graph TD;
    Task-->add;
    Task-->update;
    Task-->delete;
    Task-->start;
    Task-->Comments;
    Comments-->AddComments[add];
    Comments-->RemoveComments[remove];
    Comments-->LikeComments[like];
    Comments-->ReplyComments[reply];
    Task-->Relation;
    Relation-->Post;
    Post-->AddPost[add];
    Post-->RemovePosts[remove];
    Relation-->Link;
    Link-->AddLinks[add];
    Link-->RemoveLinks[remove];
    Relation-->Work;
    Work-->TaskAdd[add];
    Work-->TaskRemove[remove];
    
```
