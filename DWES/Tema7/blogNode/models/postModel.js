import {ObjectId} from "mongodb";
import dbClient from "../config/dbClient.js";
class postModel{
  
  async getAll(){
    const colPosts=dbClient.db.colection('posts');
    return await colPosts.find({}).toArray();
  }
  async getOne(id){
    const colPosts=dbClient.db.colection('posts');
    return await colPosts.findOne({_id: ObjectId.createFromHexString(id)})
  }
  async create(post){
    const colPosts=dbClient.db.colection('posts');
    return await colPosts.insertOne(post);
  }
  async update(id, mascota){
    const colPosts=dbClient.db.colection('posts');
    return await colPosts.findOneAndUpdate({_id: ObjectId.createFromHexString(id)}, 
      {$set:post},
      {returnDocument:'after'});
  }
  async delete(id){
    const colPosts=dbClient.db.colection('posts');
    return await colPosts.deleteOne({_id: ObjectId.createFromHexString(id)});
  }
}
export default new postModel();