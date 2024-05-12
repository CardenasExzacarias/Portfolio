import { Text, View } from "react-native";
import { PostMedia as PostMediaTypes } from "../../types";
import ViewButton from "../ViewButton";
import generalStyle from "../../styles/styles";

const PostMedia = ({ post }: { post: PostMediaTypes }) => {
  return (
    <View style={generalStyle.content}>
      <Text style={[generalStyle.title, generalStyle.text]}>{post.title}</Text>
      <Text style={[generalStyle.date, generalStyle.text]}>{post.date}</Text>
      <ViewButton screen={"Details"} mediaData={post} />
    </View>
  );
};

export default PostMedia;
