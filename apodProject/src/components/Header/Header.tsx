import {
  Image,
  Linking,
  StyleSheet,
  Text,
  TouchableOpacity,
  View,
} from "react-native";

const Header = () => {
  const handlePress = () => {
    const urlApod = "https://apod.nasa.gov/apod/";
    Linking.openURL(urlApod);
  };
  return (
    <View style={style.container}>
      <View style={style.leftContainer}>
        <Text style={style.title}>Explorar</Text>
      </View>
      <TouchableOpacity style={style.rightContainer} onPress={handlePress}>
        <Image
          style={style.image}
          source={require("../../../assets/nasaLogo.png")}
        />
      </TouchableOpacity>
    </View>
  );
};

const style = StyleSheet.create({
  container: {
    flexDirection: "row",
    alignItems: "center",
    paddingHorizontal: 20,
    backgroundColor: "#001c5d",
  },
  leftContainer: { flex: 1, alignItems: "flex-start" },
  rightContainer: { flex: 1, alignItems: "flex-end" },
  title: { fontSize: 20, color: "#fff" },
  image: { width: 60, height: 60 },
});

export default Header;
