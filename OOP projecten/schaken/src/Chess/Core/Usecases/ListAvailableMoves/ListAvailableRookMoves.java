package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Coords;
import Chess.Core.Field;

import java.util.HashSet;

public class ListAvailableRookMoves extends ListAvailableMoves
{
    @Override
    public HashSet<Coords> list(Board board, Coords location) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        int x;
        int y;
        HashSet<Coords> availableMoves = new HashSet<>();
        Coords coords = null;
        var piece = board.getPiece(location);
        for(int n = 0; n < 4; n++)
        {
            y = location.y();
            x = location.x();
            moveLoop: for(int i = 0; i < 8; i++)
            {
                switch(n)
                {
                    //left
                    case 0:
                        x--;
                        if(x < 1) break moveLoop;
                        coords = new Coords(x, y);
                        break;
                    //right
                    case 1:
                        x++;
                        if(x > 8) break moveLoop;
                        coords = new Coords(x, y);
                        break;
                    //up
                    case 2:
                        y++;
                        if(y > 8) break moveLoop;
                        coords = new Coords(x, y);
                        break;
                    //down
                    case 3:
                        y--;
                        if(y < 1) break moveLoop;
                        coords = new Coords(x, y);
                        break;
                }
                if(!board.pieceOnField(coords) || isOppositePiece(board, board.getField(location).getPiece().getColor(), coords))
                {
                    availableMoves.add(coords);
                    if(isOppositePiece(board, board.getField(location).getPiece().getColor(), coords))
                    {
                        break;
                    }
                }
                else
                {
                    break;
                }
            }
        }
        return availableMoves;
    }
}
