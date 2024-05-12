import { useNavigation } from "@react-navigation/native";
import { FC } from "react";
import { StyleSheet, Text, TouchableOpacity, View } from "react-native";

import { RootStackParams, ViewButtonTypes } from "../../types";
import { NativeStackNavigationProp } from "@react-navigation/native-stack";

type PostMediaNavigationPost = NativeStackNavigationProp<
  RootStackParams,
  "Details"
>;

const ViewButton: FC<ViewButtonTypes> = ({ screen, mediaData }) => {
  const { navigate } = useNavigation<PostMediaNavigationPost>();
  const handleViewPress = () => {
    return screen === "Details"
      ? navigate("Details", mediaData)
      : navigate("Home");
  };
  return (
    <View style={style.view}>
      <TouchableOpacity onPress={handleViewPress}>
        <Text style={style.text}>Ver más</Text>
      </TouchableOpacity>
    </View>
  );
};

const style = StyleSheet.create({
  view: { alignItems: "flex-end" },
  text: { color: "#ffffffaa" },
});

export default ViewButton;
