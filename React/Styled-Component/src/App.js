import React, {useState} from 'react';

//importando o Button do arquivo index.js da pasta style
import { Button, Container, List } from './style/index.js';

import Foto from './assets/img/Foto.svg';

function App() {

  //estado => variavel , só que, essa variavel vai permitir que eu atualize os items na tela;

  //estados => variavel que toda vez que ela sofre alterção, o react recarrega a página;

  const [coment, setComents] = useState('');
  const [allComents, setAllComents] = useState([]);

  function handleClickButton() {
    const allOldComents = [...allComents, coment]

    setAllComents(allOldComents)
  }

  function handleTextArea(event) {
          setComents(event.target.value)
  }

  return (
    <Container>
      <img src={Foto} alt="imagem_pessoas"/>

      <textarea onChange={handleTextArea}></textarea>

      <Button isOn={coment} onClick={handleClickButton}>Comentar</Button>

      <List>
        {
        allComents.map((cmt, index) => (
            <li key={index}>{cmt}</li>
        ))
        }
      
      </List>

    </Container>
  );
}

export default App;
