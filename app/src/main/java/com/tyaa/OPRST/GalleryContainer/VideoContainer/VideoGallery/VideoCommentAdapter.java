package com.tyaa.OPRST.GalleryContainer.VideoContainer.VideoGallery;

import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Handler;
import android.os.Looper;
import android.os.Message;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.squareup.picasso.Picasso;
import com.tyaa.OPRST.GridAdapter.AbstractArrayAdapter;
import com.tyaa.OPRST.GridAdapter.AbstractContainerFragment;
import com.tyaa.OPRST.GridAdapter.AbstractListener;
import com.tyaa.OPRST.R;
import com.tyaa.OPRST.SiteConnector;

import java.util.ArrayList;

/**
 * Created by Pavlo on 10/23/2015.
 */
public class VideoCommentAdapter<I> extends AbstractArrayAdapter<I> {
    private static final String TAG = "VideoCommentAdapter";
    private ViewHolder vh=null;
    public VideoCommentAdapter(AbstractContainerFragment fragment) {
        super(fragment);
    }
    @Override
    public View bindView(View convertView, final int position) {
        vh = (ViewHolder) convertView.getTag(R.layout.fragment_video_comments);
        if(vh!=null) {
            final VideoCommentItem item =
                    (VideoCommentItem) getItem(position);
            vh.commentTextView.setText(item.getComment());
            vh.down_btn.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    new FetchItemsTask().execute(item.getUrlDown(), String.valueOf(position));
                }
            });
            vh.ratingTextView.setText(item.getRating());
            vh.up_btn.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    new FetchItemsTask().execute(item.getUrlUp(), String.valueOf(position));
                }
            });
        }
        return convertView;
    }
    //получение комментариев в фоновом потоке
    private class FetchItemsTask extends AsyncTask<String,Void,ArrayList<I>> {
        @Override
        protected ArrayList<I> doInBackground(String... params) {
            SiteConnector connector=new SiteConnector();
            String numberVotes=connector.vote(params[0]);
            int pos =0;
            try {
                pos = Integer.valueOf(params[1]);
            }catch(Exception ex){
                return null;
            }
            if(numberVotes!=null) {
                VideoCommentItem item = (VideoCommentItem) getItem(pos);
                if(!item.getRating().equals(numberVotes)) {
                    int index=items.indexOf(item);
                    items.remove(index);
                    item.setRating(numberVotes);
                    items.add(index, (I) item);
                    return items;
                }else{
                    Message mes=new Message();
                    mes.arg1=R.string.error_rating_message;
                    mFragment.mErrorHandler.handleMessage(mes);
                }
            }
            return null;
        }
        @Override
        protected void onPostExecute(ArrayList<I> items){
            if(items!=null) {
                notifyDataSetChanged();
            }
        }
    }
    @Override
    protected View getConvertView(ViewGroup parent) {
        View convertView=mFragment.getActivity().getLayoutInflater()
                .inflate(R.layout.fragment_video_comments, parent, false);
        ViewHolder vh = new ViewHolder();
        vh.commentTextView=(TextView)convertView
                .findViewById(R.id.comment_text);
        vh.down_btn=(Button)convertView
                .findViewById(R.id.comment_down_btn);
        vh.ratingTextView=(TextView)convertView
                .findViewById(R.id.comment_rating_text);
        vh.up_btn=(Button)convertView
                .findViewById(R.id.comment_up_btn);
        convertView.setTag(R.layout.fragment_video_comments,vh);
        return convertView;

    }
    class ViewHolder {
        TextView commentTextView;
        Button down_btn;
        TextView ratingTextView;
        Button up_btn;
    }
}
