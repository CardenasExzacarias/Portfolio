import {
  ScrollView,
  StyleSheet,
  Text,
  TouchableOpacity,
  View,
} from "react-native";
import * as Linking from "expo-linking";

import { useRoute } from "@react-navigation/native";
import { NativeStackScreenProps } from "@react-navigation/native-stack";

import { RootStackParams } from "../../types";
import DisplayMedia from "../../components/DisplayMedia";
import generalStyle from "../../styles/styles";

const Details = () => {
  const {
    params: { title, url, explanation, date, media_type, copyright },
  } = useRoute<NativeStackScreenProps<RootStackParams, "Details">["route"]>();

  return (
    <ScrollView style={generalStyle.container}>
      <View style={generalStyle.content}>
        <DisplayMedia url={url} media_type={media_type} />
        <View style={style.textContainer}>
          <Text style={[style.title, style.text]}>{title}</Text>
          {copyright !== undefined && copyright?.trim() !== "" && (
            <Text style={[style.copyright, style.text]}>
              Autor: {copyright?.trim()}
            </Text>
          )}
          <View style={style.extraDataContainer}>
            <Text style={[generalStyle.date, style.text]}>{date}</Text>
            <TouchableOpacity
              onPress={() => (url !== undefined ? Linking.openURL(url) : null)}
              style={[style.linkButton, generalStyle.centerContainer]}
            >
              <Text style={style.link}>Enlace Directo</Text>
            </TouchableOpacity>
          </View>
          <Text style={[style.explanation, style.text]}>{explanation}</Text>
        </View>
      </View>
    </ScrollView>
  );
};

const style = StyleSheet.create({
  textContainer: { paddingVertical: 5 },
  title: { fontSize: 22, fontWeight: "bold" },
  copyright: {
    fontSize: 17,
    fontWeight: "bold",
    color: "#fff",
  },
  extraDataContainer: {
    justifyContent: "space-between",
    flexDirection: "row",
    alignItems: "center",
  },
  linkButton: {
    backgroundColor: "#fff",
    borderRadius: 10,
    paddingHorizontal: 10,
    height: 35,
  },
  link: { fontSize: 16, color: "#111", fontWeight: "bold" },
  explanation: { fontSize: 16, lineHeight: 25 },
  text: { color: "#fff", marginVertical: 10 },
});

export default Details;
