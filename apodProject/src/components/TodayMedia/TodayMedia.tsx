import React, { FC } from "react";
import { Text, View } from "react-native";
import { PostMedia } from "../../types";

import ViewButton from "../ViewButton";
import DisplayMedia from "../DisplayMedia";
import generalStyle from "../../styles/styles";

const TodayMedia: FC<PostMedia> = (props) => {
  const { date, title, url, explanation, media_type } = props;
  return (
    <View style={generalStyle.content}>
      <View>
        <DisplayMedia url={url} media_type={media_type} />
      </View>
      <Text style={[generalStyle.title, generalStyle.text]}>{title}</Text>
      <Text style={[generalStyle.date, generalStyle.text]}>{date}</Text>
      <ViewButton screen={"Details"} mediaData={props} />
    </View>
  );
};

export default TodayMedia;
