/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 *
 * @format
 */

import React from 'react';
import type {PropsWithChildren} from 'react';
import {useNavigation} from '@react-navigation/native';
import {
  SafeAreaView,
  ScrollView,
  StatusBar,
  StyleSheet,
  Text,
  Image,
  View,
  TouchableOpacity,
} from 'react-native';

import {
  Colors,
} from 'react-native/Libraries/NewAppScreen';

type SectionProps = PropsWithChildren<{
  title: string;
}>;

function Section({children, title}: SectionProps): JSX.Element {
  return (
    <View style={styles.sectionContainer}>
      <Text
        style={[
          styles.sectionTitle,
          {
            color: Colors.white
          },
        ]}>
        {title}
      </Text>
      <Text
        style={[
          styles.sectionDescription,
          {
            color: Colors.light,
          },
        ]}>
        {children}
      </Text>
    </View>
  );
}
import ArreglosCredenciales from './Arreglos';
import Credenciales from './Credenciales';
import Numeros from './Numeros';
const Credencialess = () => {
  var navigation = useNavigation();
}
function App() {

  return (
    <SafeAreaView style={{ paddingBottom: 0, backgroundColor: 'white' }} style={{ backgroundColor: 'white' }}>
      <StatusBar />
        <View style={styles.barra} >
        <View style={styles.barraMargen}>
          <View style={{ paddingTop: 4 }}>
            <Image style={styles.ImagenBarra} source={require('./assets/images/behuse-logo.png')} />
          </View>
          <View style={{ flex: 1, flexDirection: 'row', position: 'absolute', right: 5, gap: 5 }}>
            <TouchableOpacity style={{
              backgroundColor: 'white', borderWidth: 1, borderBottomColor: 'blue', marginTop: 10, padding: 10, height: 40, borderRadius: 5,
            }}>
              <Text style={{ color: 'blue' }}>Iniciar sesión</Text>
            </TouchableOpacity>
            <TouchableOpacity style={styles.boton}>
              <Text>Registrarse</Text>
            </TouchableOpacity>
          </View>
        </View>
        </View>
      <ScrollView style={{ height: '100%', backgroundColor: 'aliceblue' }}>
        <View style={styles.contenedor}>
          <View style={styles.sectionContainer} style={{ borderBottomWidth: 0, borderBottomColor: 'gray', paddingBottom: 20}}>
            <View style={{ justifyContent: 'center', alignContent: 'center', alignItems: 'center' }}>
              <Image style={styles.imagen} source={require('./assets/images/Cuervo.png')} />
            </View>
            <Text style={styles.fuente}>{'\n'}Credenciales{'\n'}</Text>
            <Text style={styles.fuente1}><Text style={styles.bold}>Ir a credenciales:</Text></Text>
            <View style={{alignContent: 'center', justifyContent: 'center', alignItems: 'center'}}>
            <TouchableOpacity style={styles.botonCred} onPress={Credenciales}><Text>Credenciales</Text></TouchableOpacity>
            </View>
          </View>
        </View>
    </ScrollView>
    </SafeAreaView>
  );
}

const styles = StyleSheet.create({
  boton: {
    marginTop: 10,
    backgroundColor: 'blue',
    padding: 10,
    height: 40,
    right: 0,
    color: 'white',
    alignItems: 'center',
    borderRadius: 5,
  },
  botonCred: {
    position: 'relative',
    marginTop: 20,
    backgroundColor: '#AAA0EF',
    padding: 15,
    height: 70,
    right: 0,
    width: '50%',
    textAlign: 'center',
    alignContent: 'center',
    justifyContent: 'center',
    color: 'white',
    alignItems: 'center',
    borderRadius: 5,
  },
  barraMargen: {
    zIndex: 999,
    paddingRight: 100,
    paddingLeft: 5,
    flex: 1,
    borderBottomWidth: 2,
    borderColor: 'blue',
    alignContent: 'center',
    flexDirection: 'row',
    justifyContent: 'space-between',
    height: 56,
    backgroundColor: 'white',
  },
  barra: {
    zIndex: 999,
    flex: 1,
    width: '100%',
    borderColor: 'blue',
    alignContent: 'center',
    flexDirection: 'row',
    justifyContent: 'space-between',
    height: 56,
    backgroundColor: 'white',
  },
  ImagenBarra: {
    width: 56,
    height: 46,
  },
  bold: {
    fontWeight: 'bold',
  },
  fuente: {
    color: 'black',
    textAlign: 'center',
    fontSize: 27,
    fontWeight: 'bold',
  },
  fuente1: {
    margin: 15,
    textAlign: 'left',
    fontSize: 17,
    color: '#000000',
  },
  imagen: {
    justifyContent: 'center',
    zIndex: 999,
    width: 200,
    marginTop: 50,
    height: 200,
  },
  contenedor: {
    marginTop: 56,
  },
  sectionContainer: {
    borderWidth: 1,
    borderBottomColor: '1 solid black',
    backgroundColor: 'white',
  },
  sectionTitle: {
    fontSize: 24,
    alignItems: 'center',
    alignContent: 'center',
    justifyContent: 'center',
    fontWeight: '600',
  },
  sectionDescription: {
    marginTop: 8,
    fontSize: 18,
    alignItems: 'center',
    alignContent: 'center',
    justifyContent: 'center',
    fontWeight: '400',
  },
});

export default Numeros;
