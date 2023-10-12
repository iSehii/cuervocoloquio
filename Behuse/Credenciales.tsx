/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 *
 * @format
 */

import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import type { PropsWithChildren } from 'react';
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

function Section({ children, title }: SectionProps): JSX.Element {
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

function Credenciales() {

    return (
            <NavigationContainer>
      {

        <SafeAreaView style={{ paddingBottom: 0 }} style={{ backgroundColor: 'white' }}>
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
            <ScrollView>
                <View style={styles.contenedor}>
                    <View style={styles.sectionContainer} style={{ backgroundColor: 'aliceblue' }}>
                        <Image style={styles.imagen} source={require('./assets/images/Cuervo.png')} />
                        <Text style={styles.fuente}>{'\n'}Cervantes Hinojosa{'\n'}Gahandi Sebastian</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Correo:</Text> regular</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Género:</Text> Masculino</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Carrera:</Text> Desarrollo de Software Multiplataforma</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Grupo:</Text> DSM-42</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Matriícula:</Text> 222211429{'\n'}</Text>
                    </View>
                    <View style={styles.sectionContainer} style={{ backgroundColor: 'pink' }}>
                        <Image style={styles.imagen} source={require('./assets/images/Paola.jpg')} />
                        <Text style={styles.fuente}>{'\n'}Paola Itzel{'\n'}Rueda Hernandez</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Correo:</Text> regular</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Género:</Text> Femenino</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Carrera:</Text> Desarrollo de Software Multiplataforma</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Grupo:</Text> DSM-43</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Matriícula:</Text> 222210711{'\n'}</Text>
                    </View>
                    <View style={styles.sectionContainer} style={{ backgroundColor: '#F05055' }}>
                        <Image style={styles.imagen} source={require('./assets/images/Ruaro.jpg')} />
                        <Text style={styles.fuente}>{'\n'}Juan Manuel{'\n'}Ruaro Zepeda</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Correo:</Text> regular</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Género:</Text> Masculino</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Carrera:</Text> Desarrollo de Software Multiplataforma</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Grupo:</Text> DSM-42</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Matriícula:</Text> 222210649{'\n'}</Text>
                    </View>
                    <View style={styles.sectionContainer} style={{ backgroundColor: 'gray' }}>
                        <Image style={styles.imagen} source={require('./assets/images/Marco.jpg')} />
                        <Text style={styles.fuente}>{'\n'}Marco Antonio{'\n'}Muñiz Flores</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Correo:</Text> regular</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Género:</Text> Masculino</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Carrera:</Text> Desarrollo de Software Multiplataforma</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Grupo:</Text> DSM-42</Text>
                        <Text style={styles.fuente1}><Text style={styles.bold}>Matriícula:</Text> 222210685{'\n'}</Text>
                    </View>
                </View>
            </ScrollView>
        </SafeAreaView>
}
</NavigationContainer>
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
    contenedor: {
        marginTop: 56,
    },
    sectionContainer: {
        borderWidth: 1,
        borderBottomColor: '1 solid black',
        backgroundColor: 'white',
    },
    bold: {
        fontWeight: 'bold',
    },
    fuente: {
        color: 'black',
        marginLeft: 120,
        textAlign: 'left',
        fontSize: 27,
        fontWeight: 'bold',
    },
    fuente1: {
        marginLeft: 120,
        textAlign: 'left',
        fontSize: 17,
        color: '#000000',
    },
    imagen: {
        position: 'absolute',
        marginTop: 80,
        zIndex: 999,
        width: 100,
        marginLeft: 10,
        height: 100,
        alignItems: 'center',
        alignContent: 'center',
        justifyContent: 'center',
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

export default Credenciales;
