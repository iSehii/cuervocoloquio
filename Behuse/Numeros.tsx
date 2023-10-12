import React, { useState } from 'react';
import { View, TextInput, Button, Text, StyleSheet } from 'react-native';

function Numeros() {
    const [numero1, setNumero1] = useState('');
    const [numero2, setNumero2] = useState('');
    const [numero3, setNumero3] = useState('');

    const [resultado, setResultado] = useState('');

    const handleSubmit = () => {
        const n1 = parseInt(numero1);
        const n2 = parseInt(numero2);
        const n3 = parseInt(numero3);

        if (n1 > n2) {
            if (n2 > n3) {
                setResultado(`n1 > n2 > n3`);
            } else if (n1 > n3) {
                setResultado(`n1 > n3 > n2`);
            } else {
                setResultado(`n3 > n1 > n2`);
            }
        } else {
            if (n2 > n3) {
                if (n1 > n3) {
                    setResultado(`n2 > n1 > n3`);
                } else {
                    setResultado(`n2 > n3 > n1`);
                }
            } else {
                setResultado(`n3 > n2 > n1`);
            }
        }
    };

    return (
        <View style={styles.container}>
            <TextInput
                placeholder="Número 1"
                onChangeText={(texto) => setNumero1(texto)}
                style={styles.input}
                keyboardType="numeric"
            />
            <TextInput
                placeholder="Número 2"
                onChangeText={(texto) => setNumero2(texto)}
                style={styles.input}
                keyboardType="numeric"
            />
            <TextInput
                placeholder="Número 3"
                onChangeText={(texto) => setNumero3(texto)}
                style={styles.input}
                keyboardType="numeric"
            />
            <Button
                title="Enviar"
                onPress={handleSubmit}
                style={styles.button}
            />

            <Text style={styles.text}>
                Resultado: {resultado}
            </Text>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
    },
    input: {
        width: 200,
        height: 40,
        borderColor: 'black',
        borderWidth: 1,
        padding: 10,
    },
    button: {
        backgroundColor: 'blue',
        width: 200,
        height: 40,
        borderRadius: 5,
        margin: 10,
    },
    text: {
        fontSize: 20,
        fontWeight: 'bold',
    },
});

export default Numeros;
