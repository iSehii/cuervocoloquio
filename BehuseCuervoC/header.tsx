import React from 'react';
import { View, Image, StyleSheet, TouchableOpacity } from 'react-native';
import { useNavigation } from '@react-navigation/native';

const Header = () => {
    const navigation = useNavigation();

    return (
        <View style={styles.header}>
            <TouchableOpacity onPress={}>

            </TouchableOpacity>
            {/* Otros elementos del encabezado, como botones o texto, pueden ir aquí */}
        </View>
    );
};

const styles = StyleSheet.create({
    header: {
        flexDirection: 'row',
        justifyContent: 'space-between',
        alignItems: 'center',
        paddingHorizontal: 20,
        paddingVertical: 10,
        borderBottomWidth: 2,
        borderBottomColor: 'rgb(0, 55, 255)',
        backgroundColor: 'rgb(255, 255, 255)',
    },
    logo: {
        height: 45,
        width: 120,
        resizeMode: 'contain',
    },
});

export default Header;
