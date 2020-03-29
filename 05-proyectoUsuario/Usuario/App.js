import React,{useState} from 'react';// importar elementos d ereact
import { StyleSheet, Text, View, Image, TextInput,Button,Alert } from 'react-native'; // componentes a utilizar

export default function App() {
  const saludo= () =>{Alert.alert("hola cesde")};
   const [name, setName] = useState("");
  return (
    <View style={styles.container}>
      <Text>{name}</Text>
      <Image style={styles.logo} source={require('./assets/usuario.png')}></Image>
      <TextInput  maxLength={5} style={styles.textInput} placeholder="Usuario" onChangeText={(text)=>setName(text)}/>
      <Button  title="start " onPress={saludo}></Button>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#fff',
    alignItems: 'center',
    justifyContent: 'center',
  },
  logo:{
    width:100,
    height:100
  },
  textInput: {
    borderColor: '#000000',
    borderWidth: 1,
    borderRadius: 5,
    paddingLeft: 20,
    width: 300,
    textAlign:'center'


  }
  
});
