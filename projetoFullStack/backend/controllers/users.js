import Users from "../models/UserModel.js";
import bcrypt from "bcrypt";
import jwt from "jsonwebtoken";

 export const getUsers = async(req, res) => {
    try {
        const users = await Users.findAll({
            attributes: ['id', 'name', 'usuario']
        });
        res.json(users);
    } catch (error) {
        console.log(error);
    }
}

export const Register = async(req, res) => {
    const {name, usuario, Password, confPassword } = req.body;
    if(Password !== confPassword) return res.status(400).json({msg: "as senhas não conferem, por favor verifique e tente novamente :)"});
    const salt = await bcrypt.genSalt();
    const hashPassword = await bcrypt.hash(Password, salt);
    try {
        await Users.create({
            name: name,
            usuario: usuario,
            Password: hashPassword,
        });
        res.json({msg: "Registrado com Sucesso"});
    } catch (error) {
        console.log(error);
    }
}

export const Login = async( req, res) => {
    try {
        const user = await Users.findAll({
            where:{
                usuario: req.body.usuario
            }
        });
        const match = await bcrypt.compare( req.body.Password, user[0].Password);
        if(!match) return res.status(400).json({msg: "Senha Errada"});
        const userId = user[0].id;
        const name = user[0].name;
        const usuario = user[0].usuario;
        const accessToken = jwt.sign({userId, name, usuario}, process.env.ACCESS_TOKEN_SECRET,{
            expiresIn: '20s'
        });
        const refreshToken = jwt.sign({userId, name, usuario}, process.env.REFRESH_TOKEN_SECRET,{
            expiresIn: '1d'
        });
        await Users.update({refresh_token:refreshToken}, {
            where:{
                id:userId
            }
        });
        res.cookie('refreshToken', refreshToken,{
            httpOnly: true,
            maxAge: 24 * 60 * 60 * 1000,
        });
        res.json({ accessToken });
    }  catch (error) {
        res.status(404).json({msg: "Email não encontrado"});
    }
}


export const logout = async(req, res) => {
       const refreshToken = req.cookies.refreshToken;
       if(!refreshToken) return res.sendStatus(204);
       const user = await Users.findAll({
        where:{
            refresh_token: refreshToken
        }
       });
       if(!user[0]) return res.sendStatus(204); 
       const userId = user[0].id;
       await Users.update({refresh_token: null},{
          where:{
            id: userId
          }
       });
     res.clearCookie('refreshToken');
     return res.sendStatus(200);
    }
