import React, { useState } from 'react';
import { StyleSheet, View, TouchableOpacity, Text } from 'react-native';

export default function App() {
    const [size, setSize] = useState(100);
    const [color, setColor] = useState('#007BFF'); // Inicialmente azul
    const [borderRadius, setBorderRadius] = useState(10);

    const increaseSize = () => {
        setSize((prevSize) => Math.min(300, prevSize + 10)); // Limita el tamaño máximo
        setBorderRadius((prevRadius) => Math.min(prevRadius + 10, size / 2)); // Ajusta el radio del borde
        setColor('#FF0000'); // Cambia a rojo al aumentar el tamaño
    };

    const decreaseSize = () => {
        setSize((prevSize) => Math.max(10, prevSize - 10));
        setBorderRadius((prevRadius) => Math.max(prevRadius - 15, 10)); // Ajusta el radio del borde
        setColor('#00FF00'); // Cambia a verde al disminuir el tamaño
    };

    return (
        <View style={styles.container}>
            <View style={[styles.square, { width: size, height: size, borderRadius, backgroundColor: color }]}>
                {/* Contenido del cuadrado */}
            </View>
            <View style={styles.buttonsContainer}>
                <TouchableOpacity style={styles.button} onPress={decreaseSize}>
                    <Text style={styles.buttonText}>-</Text>
                </TouchableOpacity>
                <TouchableOpacity style={styles.button} onPress={increaseSize}>
                    <Text style={styles.buttonText}>+</Text>
                </TouchableOpacity>
            </View>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
    },
    square: {
        borderWidth: 2,
        borderColor: '#FFF', // Borde blanco
        justifyContent: 'center',
        alignItems: 'center',
    },
    buttonsContainer: {
        flexDirection: 'row',
        marginTop: 20,
    },
    button: {
        backgroundColor: '#007BFF',
        padding: 10,
        marginHorizontal: 10,
        borderRadius: 5,
    },
    buttonText: {
        color: '#fff',
        fontSize: 20,
    },
});