import React from 'react';
import { NavigationContainer } from '@react-navigation/native';
import {
    SafeAreaView,
    StatusBar,
    StyleSheet,
    Text,
    Image,
    View,
    TouchableOpacity,
    ScrollView,
} from 'react-native';

const DatosCredenciales = [
    {
        Nombre: 'Cervantes Hinojosa',
        Genero: 'Masculino',
        Carrera: 'Desarrollo de Software Multiplataforma',
        Grupo: 'DSM-42',
        Matricula: '222211429',
        image: require('./assets/images/Cuervo.png'),
    },
    {
        Nombre: 'Paola Itzel Rueda Hernandez',
        Genero: 'Femenino',
        Carrera: 'Desarrollo de Software Multiplataforma',
        Grupo: 'DSM-43',
        Matricula: '222210711',
        image: require('./assets/images/Paola.jpg'),
    },
    {
        Nombre: 'Juan Manuel Ruaro Zepeda',
        Genero: 'Masculino',
        Carrera: 'Desarrollo de Software Multiplataforma',
        Grupo: 'DSM-42',
        Matricula: '222210649',
        image: require('./assets/images/Ruaro.jpg'),
    },
    {
        Nombre: 'Marco Antonio Muñiz Flores',
        Genero: 'Masculino',
        Carrera: 'Desarrollo de Software Multiplataforma',
        Grupo: 'DSM-42',
        Matricula: '222210685',
        image: require('./assets/images/Marco.jpg'),
    },
];

function Section({ title, image, ...details }) {
    return (
        <View style={styles.sectionContainer}>
            <Image style={styles.imagen} source={image} />
            <Text style={styles.fuente}>{'\n'}{title}</Text>
            {Object.entries(details).map(([key, value]) => (
                <Text key={key} style={styles.fuente1}>
                    <Text style={styles.bold}>{key}:</Text> {value}
                </Text>
            ))}
            <Text>{'\n'}</Text>
        </View>
    );
}

function ArreglosCredenciales() {
    return (
        <NavigationContainer>
            <SafeAreaView style={{ backgroundColor: 'white' }}>
                <StatusBar />
                <View style={styles.barra}>
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
                        {DatosCredenciales.map((data, index) => (
                            <Section key={index} title={data.name} image={data.image} {...data} />
                        ))}
                    </View>
                </ScrollView>
            </SafeAreaView>
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

export default ArreglosCredenciales;
