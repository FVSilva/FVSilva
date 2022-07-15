import React, { useState } from 'react'
import axios from "axios";
import { useNavigate} from "react-router-dom";

const Register = () => {
    const [name, setName] = useState('');
    const [usuario, setUsuario] = useState('');
    const [password, setPassword] = useState('');
    const [confpassword, setConfPassword] = useState('');
    const [msg, setMsg] = useState('');
    const navigate = useNavigate();

    const Register = async(e) =>{
           e.preventDefault();
           try {
              await axios.post('http://localhost:5000/users',{
                name: name,
                usuario: usuario,
                password: password,
                confpassword: confpassword
              });
              navigate.push("/")
           } catch (error) {
              if(error.response){
                setMsg(error.response.data.msg)
              }
           }
    }

  return (
     <section className="hero has-background-grey-light is-fullheight is-fullwidth">
       <div className="hero-body">
         <div className="container">
              <div className="columns is-centered">
          <div className="column is-4-desktop">
          
          <form onSubmit={ Register } className="box">
             <div className="field mt-5">
             <p className="has-text-centered">{msg}</p>
                <labeel className="label">Nome </labeel>
                <div className="controls">
                    <input type="text" className="input" placeholder="Nome"
                    value={name} onChange={(e) => setName(e.target.value)}
                    />
                    
                </div>
             </div>
             <div className="field mt-5">
                <labeel className="label">Usuario </labeel>
                <div className="controls">
                    <input type="text" className="input" placeholder="Usuario"
                     value={usuario} onChange={(e) => setUsuario(e.target.value)}
                     />
                </div>
             </div>
             <div className="field mt-5">
                <labeel className="label"> Password </labeel>
                <div className="controls">
                    <input type="password" className="input" placeholder="******"
                     value={password} onChange={(e) => setPassword(e.target.value)}
                    />
                </div>
             </div>
             <div className="field mt-5">
                <labeel className="label"> Confirme Password </labeel>
                <div className="controls">
                    <input type="password" className="input" placeholder="******"
                     value={confpassword} onChange={(e) => setConfPassword(e.target.value)}
                    />
                </div>
             </div>
             <div className="field mt-5">
                <button className="button is-success is-fullwidth">Register</button>
             </div>
          </form>     
          </div>
              </div>
         </div>
       </div>
     </section>
  )
}

export default Register;